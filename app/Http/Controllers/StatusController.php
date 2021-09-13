<?php

namespace App\Http\Controllers;

use App\Http\Requests\Status\Add;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.status.status')->with('statuses', Status::all());
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
     * @param  \App\Http\Requests\Status\Add  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Add $request)
    {
        try {
            Status::create($request->all());
            session()->flash('success', 'Status criado com sucesso.');
            return redirect()->route('status.index');
        } catch (\Throwable $e) {
            session()->flash('error', 'Erro na criação do status.');
            return redirect()->route('status.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Add $request, Status $status)
    {
        try {
            $status->update($request->all());
            session()->flash('success', 'Status actualizado com sucesso.');
            return redirect()->route('status.index');
        } catch (\Throwable $e) {
            session()->flash('error', 'Erro na actualização do status.');
            return redirect()->route('status.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status)
    {


        if ($status && $status->imovels->count() == 0) {
            try {
                $status->delete();
                session()->flash('success', 'Status deletado com sucesso.');
                return redirect()->route('status.index');
            } catch (\Throwable $e) {
                session()->flash('error', 'Erro ao deletar status.');
                return redirect()->route('status.index');
            }
        } else {
            session()->flash('error', 'Erro ao deletar: " O status esta sendo usado em um imóvel."');
            return redirect()->route('status.index');
        }
    }
}
