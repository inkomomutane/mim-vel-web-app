<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Status;
use App\Http\Requests\Status\StatusCreateRequest;
use App\Http\Requests\Status\StatusUpdateRequest;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('backend.status.index')->with('statuses',Status::all());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.status.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStatusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StatusCreateRequest $request)
    {
        try {
            Status::create($request->all());
            session()->flash('success', 'Status criado com sucesso.');
           return redirect()->route('status.index');
       } catch (\Throwable $e) {
           throw $e;
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
        return abort(404);
       // return view('backend.status.create_edit')->with('status',$status);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {
        return view('backend.status.create_edit')->with('status',$status);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStatusRequest  $request
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(StatusUpdateRequest $request, Status $status)
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
        if (!is_null($status) || $status->bairros->isEmpty()) {
            try {
                $status->delete();
                session()->flash('success', 'Status deletado com sucesso.');
                return redirect()->route('status.index');
            } catch (\Throwable $e) {
                session()->flash('error', 'Erro ao deletar status.');
                return redirect()->route('status.index');
            }
        } else {
            session()->flash('error', 'Erro ao deletar: " Contacte o administrador do sistema."');
            return redirect()->route('status.index');
        }
    }
}
