<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Cidade;
use App\Http\Requests\Cidade\CidadeCreateRequest;
use App\Http\Requests\Cidade\CidadeUpdateRequest;

class CidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('backend.cidade.index')->with('cidades',Cidade::all());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.cidade.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCidadeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CidadeCreateRequest $request)
    {
        try {
            Cidade::create($request->all());
            session()->flash('success', 'Cidade criado com sucesso.');
           return redirect()->route('cidade.index');
       } catch (\Throwable $e) {
           throw $e;
           session()->flash('error', 'Erro na criação da cidade.');
           return redirect()->route('cidade.index');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function show(Cidade $cidade)
    {
        return abort(404);
       // return view('backend.cidade.create_edit')->with('cidade',$cidade);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function edit(Cidade $cidade)
    {
        return view('backend.cidade.create_edit')->with('cidade',$cidade);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCidadeRequest  $request
     * @param  \App\Models\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function update(CidadeUpdateRequest $request, Cidade $cidade)
    {
        try {
            $cidade->update($request->all());
            session()->flash('success', 'Cidade actualizada com sucesso.');
            return redirect()->route('cidade.index');
        } catch (\Throwable $e) {
            session()->flash('error', 'Erro na actualização da cidade.');
            return redirect()->route('cidade.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cidade $cidade)
    {
        if (!is_null($cidade) || $cidade->bairros->isEmpty()) {
            try {
                $cidade->delete();
                session()->flash('success', 'Cidade deletada com sucesso.');
                return redirect()->route('cidade.index');
            } catch (\Throwable $e) {
                session()->flash('error', 'Erro ao deletar cidade.');
                return redirect()->route('cidade.index');
            }
        } else {
            session()->flash('error', 'Erro ao deletar: " Contacte o administrador do sistema."');
            return redirect()->route('cidade.index');
        }
    }
}
