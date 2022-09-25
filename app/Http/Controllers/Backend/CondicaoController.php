<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Condicao;
use App\Http\Requests\Condicao\CondicaoCreateRequest;
use App\Http\Requests\Condicao\CondicaoUpdateRequest;

class CondicaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('backend.condicao.index')->with('condicaos',Condicao::all());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.condicao.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCondicaoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CondicaoCreateRequest $request)
    {
        try {
            Condicao::create($request->all());
            $this->flasher->addFlash('success', 'Condicao criada com sucesso.');
           return redirect()->route('condicao.index');
       } catch (\Throwable $e) {
           throw $e;
           $this->flasher->addFlash('error', 'Erro na criação da condicao.');
           return redirect()->route('condicao.index');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Condicao  $condicao
     * @return \Illuminate\Http\Response
     */
    public function show(Condicao $condicao)
    {
        return abort(404);
       // return view('backend.condicao.create_edit')->with('condicao',$condicao);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Condicao  $condicao
     * @return \Illuminate\Http\Response
     */
    public function edit(Condicao $condicao)
    {
        return view('backend.condicao.create_edit')->with('condicao',$condicao);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCondicaoRequest  $request
     * @param  \App\Models\Condicao  $condicao
     * @return \Illuminate\Http\Response
     */
    public function update(CondicaoUpdateRequest $request, Condicao $condicao)
    {
        try {
            $condicao->update($request->all());
            $this->flasher->addFlash('success', 'Condicao actualizada com sucesso.');
            return redirect()->route('condicao.index');
        } catch (\Throwable $e) {
            $this->flasher->addFlash('error', 'Erro na actualização da condicao.');
            return redirect()->route('condicao.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Condicao  $condicao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Condicao $condicao)
    {
        if (!is_null($condicao) && $condicao->imovels->isEmpty()) {
            try {
                $condicao->delete();
                $this->flasher->addFlash('success', 'Condicao deletada com sucesso.');
                return redirect()->route('condicao.index');
            } catch (\Throwable $e) {
                $this->flasher->addFlash('error', 'Erro ao deletar condicao.');
                return redirect()->route('condicao.index');
            }
        } else {
            $this->flasher->addFlash('error', 'Erro ao deletar: " Contacte o administrador do sistema."');
            return redirect()->route('condicao.index');
        }
    }
}
