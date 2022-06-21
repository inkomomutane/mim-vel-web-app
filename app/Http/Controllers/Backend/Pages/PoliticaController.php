<?php

namespace App\Http\Controllers\Backend\Pages;

use App\Http\Controllers\Controller;
use App\Models\Politica;
use Illuminate\Http\Request;

class PoliticaController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Politica::first() == null) {
            Politica::create([
                'politicas' => ''
            ]);
        }
        return view('backend.politicas.index')->with('politica', Politica::first());
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Politica  $politica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
             $politica = Politica::first();
            $politicas = $request->validate([
                'politicas' => 'string|nullable'
            ]);
            $politica->update($politicas);
            session()->flash('success', 'Politicas e condiçõs actualizadas com sucesso.');
            return redirect()->route('politicas.index');
        } catch (\Throwable $e) {
            throw $e;
            session()->flash('error', 'Erro na actualização de politicas e condições');
            return redirect()->route('politicas.index');
        }
    }
}
