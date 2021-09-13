<?php

namespace App\Http\Controllers;

use App\Models\TermosECondicao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TermosECondicaoController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Storage::exists('termos.dat')) {
            $request  = Storage::get('termos.dat');
             return view('backend.termos_e_condicoes.termos_e_condicoes')->with('termos',$request);
        }
        return view('backend.termos_e_condicoes.termos_e_condicoes')->with('termos','');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SobreNose  $sobreNose
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            session()->flash('success', 'Termos e condições publicados com sucesso.');
            Storage::put('termos.dat',$request->termos);
            return redirect()->back();
        } catch (\Throwable $th) {
            session()->flash('error', 'Erro na publicação dos Termos e condições.');
            return redirect()->back();
        }

    }
}
