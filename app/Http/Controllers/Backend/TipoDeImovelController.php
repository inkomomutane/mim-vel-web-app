<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TipoDeImovel;
use App\Http\Requests\TipoDeImovel\TipoDeImovelCreateRequest;
use App\Http\Requests\TipoDeImovel\TipoDeImovelUpdateRequest;

class TipoDeImovelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('backend.tipo_de_imovel.index')
        ->with('tipo_de_imovels',TipoDeImovel::with('media')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.tipo_de_imovel.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTipoDeImovelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoDeImovelCreateRequest $request)
    {
        try {
           $tipo_de_imovel = TipoDeImovel::create($request->all());

           if(request()->hasFile('image')){
                $tipo_de_imovel->addMedia($request->image)->toMediaCollection('icons');
            }
            session()->flash('success', 'Tipo De Imovel criado com sucesso.');
           return redirect()->route('tipo_de_imovel.index');
       } catch (\Throwable $e) {
           throw $e;
           session()->flash('error', 'Erro na criação do tipo de imóvel.');
           return redirect()->route('tipo_de_imovel.index');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoDeImovel  $tipo_de_imovel
     * @return \Illuminate\Http\Response
     */
    public function show(TipoDeImovel $tipo_de_imovel)
    {
        return abort(404);
       // return view('backend.tipo_de_imovel.create_edit')->with('tipo_de_imovel',$tipo_de_imovel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoDeImovel  $tipo_de_imovel
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoDeImovel $tipo_de_imovel)
    {
        return view('backend.tipo_de_imovel.create_edit')
        ->with('tipo_de_imovel',$tipo_de_imovel);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTipoDeImovelRequest  $request
     * @param  \App\Models\TipoDeImovel  $tipo_de_imovel
     * @return \Illuminate\Http\Response
     */
    public function update(TipoDeImovelUpdateRequest $request, TipoDeImovel $tipo_de_imovel)
    {


        try
        {

            $tipo_de_imovel->update($request->all());

            if($request->hasFile('image')){
                $tipo_de_imovel->addMedia($request->image)
                ->toMediaCollection('icons');
            }

            session()->flash('success', 'Tipo De Imovel actualizado com sucesso.');
            return redirect()->route('tipo_de_imovel.index');
        } catch (\Throwable $e) {
            throw $e;
            session()->flash('error', 'Erro na actualização do tipo de imóvel.');
            return redirect()->route('tipo_de_imovel.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoDeImovel  $tipo_de_imovel
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoDeImovel $tipo_de_imovel)
    {
        if (!is_null($tipo_de_imovel) && $tipo_de_imovel->bairros->isEmpty()) {
            try {
                $tipo_de_imovel->delete();
                session()->flash('success', 'Tipo De Imovel deletado com sucesso.');
                return redirect()->route('tipo_de_imovel.index');
            } catch (\Throwable $e) {
                session()->flash('error', 'Erro ao deletar tipo de imóvel.');
                return redirect()->route('tipo_de_imovel.index');
            }
        } else {
            session()->flash('error', 'Erro ao deletar: " Contacte o administrador do sistema."');
            return redirect()->route('tipo_de_imovel.index');
        }
    }
}
