<?php

namespace App\Http\Controllers;

use App\Models\Bairro;
use App\Models\Cidade;
use App\Models\Imovel;
use App\Models\Status;
use App\Models\TipoDeImovel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImovelController extends Controller
{
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
        $path =  str_replace(" ", "_", $this->str_without_accents($request->titulo));
        $imageName = 'imoveis/' . $path . '.' . 'png';

        try {
            $data = $request->all();
            $dataCreate  = array();
            foreach ($data as $key => $value) {
                if ($key == "default_image_link" && $value) {
                    $image = str_replace('data:image/png;base64,', '', $value);
                    $image = str_replace(' ', '+', $image);
                    Storage::put('public/' . $imageName, base64_decode($image));
                    $dataCreate[$key] = $imageName;
                } else {
                    $dataCreate[$key] = $value;
                }
            }
            Imovel::create($dataCreate);
            session()->flash('success', 'Imóvel criado com sucesso.');
            return redirect()->route('imovel.index');
        } catch (\Throwable $e) {
            Storage::delete('public' . $imageName);
            session()->flash('error', 'Erro na criação do imóvel.');
            return redirect()->route('imovel.index');
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
        //
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

        $path =  str_replace(" ", "_", $this->str_without_accents($request->titulo));
        $imageName = 'imoveis/' . $path . '.' . 'png';
        try {
            $data = $request->all();
           // dd($imovel);
            $dataUpdate  = array();
            foreach ($data as $key => $value) {
                if ($key == "default_image_link" && $value && $value != null) {
                    $image = str_replace('data:image/png;base64,', '', $value);
                    $image = str_replace(' ', '+', $image);
                    Storage::put('public/' . $imageName, base64_decode($image));
                    $dataUpdate[$key] = $imageName;
                } else if ($value || $value != null || $value != '') {
                    $dataUpdate[$key] = $value;
                }
            }
            $status = $imovel->update($dataUpdate);
            if ($status && $request->default_image_link!=null) {
                $old_image = $imovel->default_image_link;
                Storage::delete('public/' . $old_image);
            }
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

    private function str_without_accents($str, $charset = 'utf-8')
    {
        $str = htmlentities($str, ENT_NOQUOTES, $charset);

        $str = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
        $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
        $str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères

        return $str;   // or add this : mb_strtoupper($str); for uppercase :)
    }
}
