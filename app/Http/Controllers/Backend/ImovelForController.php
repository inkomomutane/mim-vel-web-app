<?php

namespace App\Http\Controllers\Backend;

use App\Models\ImovelFor;
use App\Http\Controllers\Controller;
use App\Http\Requests\ImovelFor\StoreImovelForRequest;
use App\Http\Requests\ImovelFor\UpdateImovelForRequest;

class ImovelForController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.imovel_for.index')->with('imovel_fors',ImovelFor::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.imovel_for.create_edit')->with('imovel_for',ImovelFor::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreImovelForRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreImovelForRequest $request)
    {
        try {
            ImovelFor::create($request->all());
            session()->flash('success', 'Tipo de trasação criada com sucesso.');
           return redirect()->route('imovel_for.index');
       } catch (\Throwable $e) {
           throw $e;
           session()->flash('error', 'Erro na criação da tipo de transação.');
           return redirect()->route('imovel_for.index');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ImovelFor  $imovel_for
     * @return \Illuminate\Http\Response
     */
    public function show(ImovelFor $imovel_for)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ImovelFor  $imovel_for
     * @return \Illuminate\Http\Response
     */
    public function edit(ImovelFor $imovel_for)
    {
        return view('backend.imovel_for.create_edit')->with('imovel_for',$imovel_for);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateImovelForRequest  $request
     * @param  \App\Models\ImovelFor  $imovel_for
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateImovelForRequest $request, ImovelFor $imovel_for)
    {
        try {
            $imovel_for->update($request->all());
            session()->flash('success', 'Tipo de transação actualizada com sucesso.');
            return redirect()->route('imovel_for.index');
        } catch (\Throwable $e) {
            session()->flash('error', 'Erro na actualização do tipo de transação.');
            return redirect()->route('imovel_for.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ImovelFor  $imovel_for
     * @return \Illuminate\Http\Response
     */
    public function destroy(ImovelFor $imovel_for)
    {
        if (!is_null($imovel_for) || $imovel_for->imovels->isEmpty()) {
            try {
                $imovel_for->delete();
                session()->flash('success', 'Tipo de transação deletada com sucesso.');
                return redirect()->route('imovel_for.index');
            } catch (\Throwable $e) {
                session()->flash('error', 'Erro ao deletar tipo de transação.');
                return redirect()->route('imovel_for.index');
            }
        } else {
            session()->flash('error', 'Erro ao deletar: " Contacte o administrador do sistema."');
            return redirect()->route('imovel_for.index');
        }
    }
}
