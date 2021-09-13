<?php

namespace App\Http\Controllers;

use App\Models\SobreNose;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SobreNosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Storage::exists('sobre.dat')) {
            $request  = Storage::get('sobre.dat');
             return view('backend.sobre.sobre')->with('sobre',$request);
        }
        return view('backend.sobre.sobre')->with('sobre','');

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
            session()->flash('success', 'Sobre nós publicado com sucesso.');
            Storage::put('sobre.dat',$request->sobre_nos);
            return redirect()->back();
        } catch (\Throwable $th) {
            session()->flash('error', 'Erro na publicação do Sobre nós.');
            return redirect()->back();
        }

    }
}
