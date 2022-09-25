<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Bairro;
use App\Http\Requests\Bairro\BairroCreateRequest;
use App\Http\Requests\Bairro\BairroUpdateRequest;
use App\Models\Cidade;
use Flasher\Notyf\Prime\NotyfFactory;


class BairroController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('backend.bairro.index')->with('bairros',Bairro::with('cidade')->get());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.bairro.create_edit')->with('cidades',Cidade::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBairroRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BairroCreateRequest $request)
    {
        try {
            Bairro::create($request->all());
            $this->flasher->addSuccess('Bairro criado com sucesso.');
           return redirect()->route('bairro.index');
       } catch (\Throwable $e) {
           throw $e;
           $this->flasher->addError('Erro na criação do bairro.');
           return redirect()->route('bairro.index');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bairro  $bairro
     * @return \Illuminate\Http\Response
     */
    public function show(Bairro $bairro)
    {
        return abort(404);
       // return view('backend.bairro.create_edit')->with('bairro',$bairro);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bairro  $bairro
     * @return \Illuminate\Http\Response
     */
    public function edit(Bairro $bairro)
    {
        return view('backend.bairro.create_edit')->with('bairro',$bairro)->with('cidades',Cidade::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBairroRequest  $request
     * @param  \App\Models\Bairro  $bairro
     * @return \Illuminate\Http\Response
     */
    public function update(BairroUpdateRequest $request, Bairro $bairro)
    {
        try {
            $bairro->update($request->all());
            $this->flasher->addSuccess('Bairro actualizado com sucesso.');
            return redirect()->route('bairro.index');
        } catch (\Throwable $e) {
            $this->flasher->addeError('Erro na actualização do bairro.');
            return redirect()->route('bairro.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bairro  $bairro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bairro $bairro,NotyfFactory $flasher)
    {
        if (!is_null($bairro) && $bairro->imovels->isEmpty()) {
            try {
                $bairro->delete();
                $flasher->addSuccess('Bairro deletado com sucesso.');
                return redirect()->route('bairro.index');
            } catch (\Throwable $e) {
                $flasher->addError('Erro ao deletar bairro.');
                return redirect()->route('bairro.index');
            }
        } else {
            $flasher->addError('Erro ao deletar: " Contacte o administrador do sistema."');
            return redirect()->route('bairro.index');
        }
    }
}
