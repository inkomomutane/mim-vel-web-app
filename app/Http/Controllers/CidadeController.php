<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cidade\Add;
use App\Models\Cidade;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.cidade.cidade')->with('cidades', Cidade::all());
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
     * @param  \App\Http\Requests\Cidade\Add  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Add $request)
    {
        try {
            Cidade::create($request->all());
            session()->flash('success', 'Cidade criada com sucesso.');
            return redirect()->route('cidade.index');
        } catch (\Throwable $e) {
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
        $cidade = Cidade::where('id',$cidade->id)->with('bairros')->first();
        return $cidade;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function edit(Cidade $cidade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function update(Add $request, Cidade $cidade)
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


        if ($cidade && $cidade->imovels->count() == 0) {
            try {
                $cidade->delete();
                session()->flash('success', 'Cidade deletada com sucesso.');
                return redirect()->route('cidade.index');
            } catch (\Throwable $e) {
                session()->flash('error', 'Erro ao deletar cidade.');
                return redirect()->route('cidade.index');
            }
        } else {
            session()->flash('error', 'Erro ao deletar: " O cidade esta sendo usada em um imóvel."');
            return redirect()->route('cidade.index');
        }
    }
}
