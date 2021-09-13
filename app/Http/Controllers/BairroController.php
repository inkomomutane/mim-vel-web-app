<?php

namespace App\Http\Controllers;

use App\Http\Requests\Bairro\Add;
use App\Models\Bairro;
use App\Models\Cidade;
use Illuminate\Http\Request;

class BairroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.bairro.bairro')->with('bairros', Bairro::all())->with('cidades',Cidade::all());
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
     * @param  \App\Http\Requests\Bairro\Add  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Add $request)
    {
        try {
            Bairro::create($request->all());
            session()->flash('success', 'Bairro criado com sucesso.');
            return redirect()->route('bairro.index');
        } catch (\Throwable $e) {
            session()->flash('error', 'Erro na criação do bairro.');
            return redirect()->route('bairro.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bairro  $bairro
     * @return \Illuminate\Http\Response
     */
    public function show(Bairro $bairro)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bairro  $bairro
     * @return \Illuminate\Http\Response
     */
    public function edit(Bairro $bairro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bairro  $bairro
     * @return \Illuminate\Http\Response
     */
    public function update(Add $request, Bairro $bairro)
    {
        try {
            $bairro->update($request->all());
            session()->flash('success', 'Bairro actualizado com sucesso.');
            return redirect()->route('bairro.index');
        } catch (\Throwable $e) {
            session()->flash('error', 'Erro na actualização do bairro.');
            return redirect()->route('bairro.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bairro  $bairro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bairro $bairro)
    {


        if ($bairro && $bairro->imovels->count() == 0) {
            try {
                $bairro->delete();
                session()->flash('success', 'Bairro deletado com sucesso.');
                return redirect()->route('bairro.index');
            } catch (\Throwable $e) {
                session()->flash('error', 'Erro ao deletar bairro.');
                return redirect()->route('bairro.index');
            }
        } else {
            session()->flash('error', 'Erro ao deletar: " O bairro esta sendo usado em um imóvel."');
            return redirect()->route('bairro.index');
        }
    }
}
