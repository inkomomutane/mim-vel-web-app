<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\User;
use Illuminate\Http\Request;

class AgendaController extends Controller
{  /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
    if(User::where('id',auth()->user()->id)->first()->hasRole(['ceo','admin'])){
        return view('backend.agenda.agenda')->with('agendas', Agenda::all()->map(function($agenda)
        {
           $agenda->horario = date_format($agenda->horario,'Y-m-d');
           return $agenda;
        }));
    }else
        $agendas = Agenda::where('corretor_id',auth()->user()->id)->get();
        $agendas->map(function($agenda)
        {
           $agenda->horario = date_format($agenda->horario,'Y-m-d');
           return $agenda;
        });
        return view('backend.agenda.agenda')->with('agendas', $agendas);
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
    * @param  \App\Http\Requests\Agenda\Request  $request
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
    * @param  \App\Models\Agenda  $agenda
    * @return \Illuminate\Http\Response
    */
   public function show(Agenda $agenda)
   {

   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Agenda  $agenda
    * @return \Illuminate\Http\Response
    */
   public function edit(Agenda $agenda)
   {
       //
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Agenda  $agenda
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Agenda $agenda)
   {

            //dd($request->all());
        $data = $request->validate([
            'nome_cliente' => 'required|string',
            'contacto' => 'required|numeric',
            'horario' => 'required|date',
            'corretor_id' => 'required|numeric',
            'imovel_id' => 'required|numeric',
            'local_de_encontro' => 'string',
            'confirmed' => 'required'
        ]);

       try {
           $agenda->update($data);
           session()->flash('success', 'Agenda actualizado com sucesso.');
           return redirect()->route('agenda.index');
       } catch (\Throwable $e) {
           session()->flash('error', 'Erro na actualização do agenda.');
           return redirect()->route('agenda.index');
       }
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Agenda  $agenda
    * @return \Illuminate\Http\Response
    */
   public function destroy(Agenda $agenda)
   {
        try {
            $agenda->delete();
            session()->flash('success', 'Agenda deletado com sucesso.');
            return redirect()->route('agenda.index');
        } catch (\Throwable $e) {
            session()->flash('error', 'Erro ao deletar agenda.');
            return redirect()->route('agenda.index');
        }
   }
}
