<?php

namespace App\Http\Controllers;

use App\Http\Traits\RemoveAccent;
use App\Models\Bairro;
use App\Models\Cidade;
use App\Models\Foto;
use App\Models\Imovel;
use App\Models\Status;
use App\Models\TipoDeImovel;
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
        return view('backend.imovel')->with('imoveis', Imovel::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.imovelCreatEdit')->with([
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
       // $path =  str_replace(" ", "_", $this->str_without_accents($request->titulo));
        //$imageName = 'imoveis/' . $path . '.' . 'png';

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
           // Storage::delete('public' . $imageName);
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
            foreach($request->all() as $id => $value){
                if ($id != '_token') {
                     $foto = $imovel->fotos->where('id',$id)->first();
                     $foto->delete();
                   //  dd($value);
                     Storage::delete('public/'.$value);

                }
            }
            session()->flash('success', 'Fotos deletadas com sucesso.');
            return redirect()->back();

        } catch (\Throwable $th) {
            session()->flash('error', 'Erro ao deletar Fotos.'. $th);
            return redirect()->back();
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
        return view('backend.galeria')->with('imovel',$imovel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Imovel  $imovel
     * @return \Illuminate\Http\Response
     */
    public function edit(Imovel $imovel)
    {
        return view('backend.imovelCreatEdit')->with([
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

        //$path =  str_replace(" ", "_", $this->str_without_accents($request->titulo));
       // $imageName = 'imoveis/' . $path . '.' . 'png';
        try {
            $data = $request->all();
           // dd($imovel);
            $dataUpdate  = array();
            foreach ($data as $key => $value) {
                $dataUpdate[$key] = $value;
                /*
                if ($key == "default_image_link" && $value && $value != null) {
                    $image = str_replace('data:image/png;base64,', '', $value);
                    $image = str_replace(' ', '+', $image);
                    Storage::put('public/' . $imageName, base64_decode($image));
                    $dataUpdate[$key] = $imageName;
                } else if ($value || $value != null || $value != '') {

                }*/
            }
            $imovel->update($dataUpdate);
            session()->flash('success', 'Imóvel actualizado com sucesso.');
            return redirect()->route('imovel.index');
        } catch (\Throwable $e) {
            dd($e);
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
        $imovel->images()->sync([]);
    }

}
