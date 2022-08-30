<?php

namespace App\Http\Controllers\Backend;

use App\Models\RegraDeNegocio;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegraDeNegocio\StoreRegraDeNegocioRequest;
use App\Http\Requests\RegraDeNegocio\UpdateRegraDeNegocioRequest;

class RegraDeNegocioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.regra_de_negocio.index')->with('regra_de_negocios',RegraDeNegocio::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.regra_de_negocio.create_edit')->with('regra_de_negocio',RegraDeNegocio::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRegraDeNegocioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRegraDeNegocioRequest $request)
    {
        try {
            RegraDeNegocio::create($request->all());
            session()->flash('success', 'Regra de negóciação criada com sucesso.');
           return redirect()->route('regra_de_negocio.index');
       } catch (\Throwable $e) {
           throw $e;
           session()->flash('error', 'Erro na criação da regra de nogociação.');
           return redirect()->route('regra_de_negocio.index');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RegraDeNegocio  $regraDeNegocio
     * @return \Illuminate\Http\Response
     */
    public function show(RegraDeNegocio $regraDeNegocio)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RegraDeNegocio  $regraDeNegocio
     * @return \Illuminate\Http\Response
     */
    public function edit(RegraDeNegocio $regraDeNegocio)
    {
        return view('backend.regra_de_negocio.create_edit')->with('regra_de_negocio',$regraDeNegocio);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRegraDeNegocioRequest  $request
     * @param  \App\Models\RegraDeNegocio  $regraDeNegocio
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRegraDeNegocioRequest $request, RegraDeNegocio $regraDeNegocio)
    {
        try {
            $regraDeNegocio->update($request->all());
            session()->flash('success', 'regra de negociação actualizada com sucesso.');
            return redirect()->route('regra_de_negocio.index');
        } catch (\Throwable $e) {
            session()->flash('error', 'Erro na actualização da regra de nociação.');
            return redirect()->route('regra_de_negocio.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RegraDeNegocio  $regraDeNegocio
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegraDeNegocio $regraDeNegocio)
    {
        if (!is_null($regraDeNegocio) && $regraDeNegocio->imovels->isEmpty()) {
            try {
                $regraDeNegocio->delete();
                session()->flash('success', 'Regra de negociação deletada com sucesso.');
                return redirect()->route('regra_de_negocio.index');
            } catch (\Throwable $e) {
                session()->flash('error', 'Erro ao deletar regra de nogociação.');
                return redirect()->route('regra_de_negocio.index');
            }
        } else {
            session()->flash('error', 'Erro ao deletar: " Contacte o administrador do sistema."');
            return redirect()->route('regra_de_negocio.index');
        }
    }
}
