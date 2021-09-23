<?php

namespace App\Http\Controllers;

use App\Http\Requests\Status\Add;
use App\Models\Condicao;
use Illuminate\Http\Request;

class CondicaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.condicao.condicao')->with('condicaos', Condicao::all());
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
    public function store(Add $request)
    {
        try {
            Condicao::create($request->all());
            session()->flash('success', 'Condição criada com sucesso.');
            return redirect()->route('condicao.index');
        } catch (\Throwable $e) {
            session()->flash('error', 'Erro na criação da condição.');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Condicao  $condicao
     * @return \Illuminate\Http\Response
     */
    public function edit(Condicao $condicao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Condicao  $condicao
     * @return \Illuminate\Http\Response
     */
    public function update(Add $request, Condicao $condicao)
    {
        try {
            $condicao->update($request->all());
            session()->flash('success', 'Condição actualizado com sucesso.');
            return redirect()->route('condicao.index');
        } catch (\Throwable $e) {
            session()->flash('error', 'Erro na actualização do condição.');
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
        if ($condicao && $condicao->imovels->count() == 0) {
            try {
                $condicao->delete();
                session()->flash('success', 'Condição deletada com sucesso.');
                return redirect()->route('condicao.index');
            } catch (\Throwable $e) {
                session()->flash('error', 'Erro ao deletar condição.');
                return redirect()->route('condicao.index');
            }
        } else {
            session()->flash('error', 'Erro ao deletar: " A condição esta sendo usada em um imóvel."');
            return redirect()->route('condicao.index');
        }
    }
}
