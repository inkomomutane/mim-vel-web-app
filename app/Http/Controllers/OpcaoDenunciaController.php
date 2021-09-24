<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Denuncia\Add;
use App\Models\Denuncia;

class OpcaoDenunciaController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.denuncia.denuncia')->with('denuncias', Denuncia::all());
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
     * @param  \App\Http\Requests\Denuncia\Add  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Add $request)
    {
        try {
            Denuncia::create($request->all());
            session()->flash('success', 'Denuncia criada com sucesso.');
            return redirect()->route('opcao_denuncie.index');
        } catch (\Throwable $e) {
            session()->flash('error', 'Erro na criação da denuncias.');
            return redirect()->route('opcao_denuncie.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Denuncia  $opcao_denuncie
     * @return \Illuminate\Http\Response
     */
    public function show(Denuncia $opcao_denuncie)
    {
            return $opcao_denuncie;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Denuncia  $opcao_denuncie
     * @return \Illuminate\Http\Response
     */
    public function edit(Denuncia $opcao_denuncie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Denuncia  $opcao_denuncie
     * @return \Illuminate\Http\Response
     */
    public function update(Add $request, Denuncia $opcao_denuncie)
    {
        try {


            $opcao_denuncie->update($request->all());
            session()->flash('success', 'Denuncia actualizada com sucesso.');
            return redirect()->route('opcao_denuncie.index');
        } catch (\Throwable $e) {
            session()->flash('error', 'Erro na actualização da opcao_denuncie.');
            return redirect()->route('opcao_denuncie.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Denuncia  $opcao_denuncie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Denuncia $opcao_denuncie)
    {


        if ($opcao_denuncie && $opcao_denuncie->denunias_imovels->count() == 0) {
            try {
                $opcao_denuncie->delete();
                session()->flash('success', 'Denuncia deletada com sucesso.');
                return redirect()->route('opcao_denuncie.index');
            } catch (\Throwable $e) {
                session()->flash('error', 'Erro ao deletar opcao_denuncie.');
                return redirect()->route('opcao_denuncie.index');
            }
        } else {
            session()->flash('error', 'Erro ao deletar: " O opcao_denuncie esta sendo usada em um imóvel."');
            return redirect()->route('opcao_denuncie.index');
        }
    }
}

