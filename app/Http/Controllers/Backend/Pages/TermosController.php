<?php

namespace App\Http\Controllers\Backend\Pages;

use App\Http\Controllers\Controller;
use App\Models\Termo;
use Illuminate\Http\Request;

class TermosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Termo::first() == null) {
            Termo::create([
                'termos' => ''
            ]);
        }
        return view('backend.termos.index')->with('termo', Termo::first());
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Termo  $termo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
             $termo = Termo::first();
            $termos = $request->validate([
                'termos' => 'string|nullable'
            ]);
            $termo->update($termos);
            session()->flash('success', 'Termos e condiçõs actualizadas com sucesso.');
            return redirect()->route('termos.index');
        } catch (\Throwable $e) {
            throw $e;
            session()->flash('error', 'Erro na actualização de termos e condições');
            return redirect()->route('termos.index');
        }
    }
}
