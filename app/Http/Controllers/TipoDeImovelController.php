<?php

namespace App\Http\Controllers;

use App\Http\Requests\TipoDeImovel\Add;
use App\Models\TipoDeImovel;
use Illuminate\Http\Request;

class TipoDeImovelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.tipodeimovel')->with('tipodeimovels', TipoDeImovel::all());
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
     * @param  \App\Http\Requests\TipoDeImovel\Add  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Add $request)
    {
        try {
            TipoDeImovel::create($request->all());
            session()->flash('success', 'Tipo de imovelcriado com sucesso.');
            return redirect()->route('tipodeimovel.index');
        } catch (\Throwable $e) {
            session()->flash('error', 'Erro na criação do tipodeimovel.');
            return redirect()->route('tipodeimovel.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoDeImovel  $tipodeimovel
     * @return \Illuminate\Http\Response
     */
    public function show(TipoDeImovel $tipodeimovel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoDeImovel  $tipodeimovel
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoDeImovel $tipodeimovel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoDeImovel  $tipodeimovel
     * @return \Illuminate\Http\Response
     */
    public function update(Add $request, TipoDeImovel $tipodeimovel)
    {
        try {
            $tipodeimovel->update($request->all());
            session()->flash('success', 'Tipo de imovel actualizado com sucesso.');
            return redirect()->route('tipodeimovel.index');
        } catch (\Throwable $e) {
            session()->flash('error', 'Erro na actualização do tipodeimovel.');
            return redirect()->route('tipodeimovel.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoDeImovel  $tipodeimovel
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoDeImovel $tipodeimovel)
    {


        if ($tipodeimovel && $tipodeimovel->imovels->count() == 0) {
            try {
                $tipodeimovel->delete();
                session()->flash('success', 'Tipo de imovel deletado com sucesso.');
                return redirect()->route('tipodeimovel.index');
            } catch (\Throwable $e) {
                session()->flash('error', 'Erro ao deletar tipodeimovel.');
                return redirect()->route('tipodeimovel.index');
            }
        } else {
            session()->flash('error', 'Erro ao deletar: " O tipodeimovel esta sendo usado em um imóvel."');
            return redirect()->route('tipodeimovel.index');
        }
    }
}
