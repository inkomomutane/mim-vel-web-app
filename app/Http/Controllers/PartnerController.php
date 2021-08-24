<?php

namespace App\Http\Controllers;

use App\Http\Traits\RemoveAccent;
use App\Models\Foto;
use App\Models\Partner;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    use RemoveAccent;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.partiners.partiners')->with('parceiros',Partner::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            Partner::create($request->all());
            session()->flash('success', 'Parceiro criado com sucesso.');
            return redirect()->route('parceiro.index');
        } catch (\Throwable $e) {
            session()->flash('error', 'Erro na criação do parceiro.');
            return redirect()->route('parceiro.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $parceiro)
    {
        $parceiro = Partner::where('id',$parceiro->id)->with('fotos')->first();
        return $parceiro;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $parceiro)
    {
        return view('backend.partiners.galeria')->with('parceiro',$parceiro);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $parceiro)
    {
        try {
            $data = $parceiro->update($request->all());
            session()->flash('success', 'Parceiro actualizado com sucesso.');
            return redirect()->route('parceiro.index');
        } catch (\Throwable $e) {
            session()->flash('error', 'Erro na actualização do parceiro.');
            return redirect()->route('parceiro.index');
        }
    }


    public function store_image(Request $request,Partner $parceiro)
    {
        $validation = $request->validate([
            'default_image_link' => 'required'
        ]);

        if ($validation) {
            try {
                $date = date_format((new DateTime('now'))," Y m d H i s");
                $path =  str_replace(" ", "_", $this->str_without_accents($parceiro->name) . $date);
                $imageName = 'partiners/' . $path . '.' . 'png';
                $image = str_replace('data:image/png;base64,', '', $request->default_image_link);
                $image = str_replace(' ', '+', $image);
                Storage::put('public/' . $imageName, base64_decode($image));
                Foto::create([
                    'fotable_id' =>$parceiro->id,
                    'fotable_type' => 'App\Models\Partner',
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

    public function delete_image(Request $request,Partner $parceiro)
    {

            try {
             $status = $this->delete_images_of_imoveis($request->all(),$parceiro);
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

    private function delete_images_of_imoveis($array, Partner $parceiro){
        try {
            foreach($array as $id => $value){
                if ($id != '_token') {
                     $foto = $parceiro->fotos->where('id',$id)->first();
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $parceiro)
    {
        try {
            $array = [];
            foreach ($parceiro->fotos as  $foto) {
                $array[$foto->id] = $foto->url;
            }
            if ($this->delete_images_of_imoveis($array,$parceiro) == 200) {
                $parceiro->delete();
                session()->flash('success', 'Parceiro deletado com sucesso.');
                return redirect()->route('parceiro.index');
            }else{
                session()->flash('error', 'Erro ao Deletar o parceiro.');
                return redirect()->route('parceiro.index');
            }
           } catch (\Throwable $th) {
            session()->flash('error', 'Erro ao Deletar o parceiro.' . $th);
            return redirect()->route('parceiro.index');
           }
    }
}
