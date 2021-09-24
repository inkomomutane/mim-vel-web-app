<?php

namespace App\Http\Controllers;

use App\Models\Denuncia;
use App\Models\DenuniasImovel;
use Illuminate\Http\Request;

class DenunciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.complaint.complaint')->with('complaints',DenuniasImovel::all());
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
    public function store(Request $request)
    {

        $validade = $request->validate([
            'nome_do_denunciante' => 'string',
            'imovel_id' => 'required',
            'denuncia_id' => 'required',
            'denuncia' => 'string'
        ]);
        if ($validade) {
            try {
               DenuniasImovel::create($request->all());
                session()->flash('success', 'Denûncia Feita com sucesso.');
                return redirect()->back();
            } catch (\Throwable $e) {
                session()->flash('error', 'Erro ao fazer a Denûncia.');
                return redirect()->back();
            }
        }
        session()->flash('error', 'Erro ao fazer a Denûncia.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Denuncia  $denuncia
     * @return \Illuminate\Http\Response
     */
    public function show(Denuncia $denuncia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Denuncia  $denuncia
     * @return \Illuminate\Http\Response
     */
    public function edit(Denuncia $denuncia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Denuncia  $denuncia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Denuncia $denuncia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Denuncia  $denuncia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Denuncia $denuncia)
    {
        //
    }
}
