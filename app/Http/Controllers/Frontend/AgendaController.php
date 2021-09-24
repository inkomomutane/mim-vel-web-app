<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Agenda;
use App\Http\Controllers\Controller;
use App\Models\Imovel;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.agendar');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nome_cliente' => 'required|string',
            'contacto' => 'required|numeric',
            'horario' => 'required|date',
            'corretor_id' => 'required|numeric',
            'imovel_id' => 'required|numeric'
        ]);
        try {
            Agenda::create($data);
            session()->flash('success', 'A sua agenda a visita foi marcada com sucesso! aguarde pela  nossa confirmação. ( sms | chamada )');
            return redirect()->back();
        } catch (\Throwable $e) {
            session()->flash('error', 'Erro ao agendar sua visita, verifica se prencheu todos dados corretamente!');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function show( Agenda $agenda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function edit( Agenda $agenda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  Agenda $agenda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function destroy( Agenda $agenda)
    {
        //
    }
}
