<?php

namespace App\Http\Controllers;

use App\Http\Traits\RemoveAccent;
use App\Models\Agenda;
use App\Models\Bairro;
use App\Models\Cidade;
use App\Models\Comentario;
use App\Models\Denuncia;
use App\Models\DenuniasImovel;
use App\Models\Foto;
use App\Models\Imovel;
use App\Models\Status;
use App\Models\TipoDeImovel;
use App\Models\User;
use App\Models\Visit;
use Awssat\Visits\Models\Visit as ModelsVisit;
use Awssat\Visits\Visits;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class ImovelController extends Controller
{
    use RemoveAccent;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(User::where('id',auth()->user()->id)->first()->hasRole(['ceo','admin'])){
        $imoveis = Imovel::with('visits')->get();
        return view('backend.imovel.imovel')->with('imoveis', $imoveis);
    }else
        $imoveis = Imovel::where('postado_por',auth()->user()->id)->with('visits')->get();
        return view('backend.imovel.imovel')->with('imoveis', $imoveis);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.imovel.imovelCreatEdit')->with([
            'cidades' => Cidade::all(),
            'bairros' => Bairro::all(),
            'tipoDeImoveis' => TipoDeImovel::all(),
            'statuses' => Status::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $dataCreate  = array();
            foreach ($data as $key => $value) {
                $dataCreate[$key] = $value;
            }
            $imovel = Imovel::create($dataCreate);
            $words = explode(" ",auth()->user()->name);
            $acronym = "";
            foreach ($words as $w) {
            $acronym .= $w[0];
            }
            $imovel->codigo = strtoupper($acronym.$imovel->id);
            $imovel->save();
            session()->flash('success', 'Imóvel criado com sucesso.');
            return redirect()->route('imovel.index');
        } catch (\Throwable $e) {
            dd($e);
            session()->flash('error', 'Erro na criação do imóvel.');
            return redirect()->route('imovel.index');
        }
    }

    public function store_image(Request $request,Imovel $imovel)
    {
        $validation = $request->validate([
            'default_image_link' => 'required'
        ]);

        if ($validation) {
            try {
                $date = date_format((new DateTime('now'))," Y m d H i s");
                $path =  str_replace(" ", "_", $this->str_without_accents($imovel->titulo) . $date);
                $imageName = 'imoveis/' . $path . '.' . 'png';
                $image = str_replace('data:image/png;base64,', '', $request->default_image_link);
                $image = str_replace(' ', '+', $image);
                Storage::put('public/' . $imageName, base64_decode($image));
                Foto::create([
                    'fotable_id' =>$imovel->id,
                    'fotable_type' => 'App\Models\Imovel',
                    'url'=> $imageName
                ]);
                session()->flash('success', 'Foto criada com sucesso.');
                return redirect()->back();

            } catch (\Throwable $th) {

                session()->flash('error', 'Erro na criação da Foto.');
                return redirect()->back();
            }
        }
        session()->flash('error', 'Erro na criação da Foto.');
        return redirect()->back();
    }

    public function delete_image(Request $request,Imovel $imovel)
    {

            try {
             $status = $this->delete_images_of_imoveis($request->all(),$imovel);
             if($status == 200){
                session()->flash('success', 'Fotos deletadas com sucesso.');
                return redirect()->back();
             }else{
                session()->flash('error', 'Erro ao deletar Fotos.');
                return redirect()->back();
             }

            } catch (\Throwable $th) {
                session()->flash('error', 'Erro ao deletar Fotos.'. $th);
                return redirect()->back();
            }

    }

    private function delete_images_of_imoveis($array, Imovel $imovel){
        try {
            foreach($array as $id => $value){
                if ($id != '_token') {
                     $foto = $imovel->fotos->where('id',$id)->first();
                     $foto->delete();
                     Storage::delete('public/'.$value);
                }
            }
            return 200;
        } catch (\Throwable $th) {
            return 403;
        }

    }





    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Imovel  $imovel
     * @return \Illuminate\Http\Response
     */
    public function show(Imovel $imovel)
    {
        return view('backend.imovel.galeria')->with('imovel',$imovel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Imovel  $imovel
     * @return \Illuminate\Http\Response
     */
    public function edit(Imovel $imovel)
    {
        return view('backend.imovel.imovelCreatEdit')->with([
            'cidades' => Cidade::all(),
            'bairros' => Bairro::all(),
            'tipoDeImoveis' => TipoDeImovel::all(),
            'statuses' => Status::all(),
            'imovel' => $imovel
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Imovel  $imovel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Imovel $imovel)
    {
        try {
            $data = $request->all();

            $dataUpdate  = array();
            foreach ($data as $key => $value) {
                $dataUpdate[$key] = $value;
            }
            $imovel->update($dataUpdate);
            session()->flash('success', 'Imóvel actualizado com sucesso.');
            return redirect()->route('imovel.index');
        } catch (\Throwable $e) {
            session()->flash('error', 'Erro na actualização do imóvel.');
            return redirect()->route('imovel.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Imovel  $imovel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Imovel $imovel)
    {
       try {
        $array = [];
        foreach ($imovel->fotos as  $foto) {
            $array[$foto->id] = $foto->url;
        }
        if ($this->delete_images_of_imoveis($array,$imovel) == 200) {
            Comentario::destroy($imovel->comentarios->pluck('id'));
            DenuniasImovel::destroy($imovel->denunias_imovels->pluck('id'));
            DenuniasImovel::destroy( $imovel->users_ratings->pluck('id'));
            ModelsVisit::where('secondary_key',''.$imovel->id)->delete();
            Agenda::destroy($imovel->agendas->pluck('id'));
            $imovel->delete();
            session()->flash('success', 'Imóvel deletado com sucesso.');
            return redirect()->route('imovel.index');
        }else{
            session()->flash('error', 'Erro ao Deletar o imóvel.');
            return redirect()->route('imovel.index');
        }
       } catch (\Throwable $th) {
        session()->flash('error', 'Erro ao Deletar o imóvel.' . $th);
        return redirect()->route('imovel.index');
       }
    }

    public function search($query)
    {
       return Imovel::search($query)
        ->with('bairro')
        ->with('condicao')
        ->with('status')
        ->with('tipo_de_imovels')
        ->paginate(15);
    }


}
