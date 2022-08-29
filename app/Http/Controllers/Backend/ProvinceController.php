<?php

namespace App\Http\Controllers\Backend;



use App\Models\Province;
use App\Http\Controllers\Controller;
use App\Http\Requests\Province\StoreProvinceRequest;
use App\Http\Requests\Province\UpdateProvinceRequest;


class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.province.index')->with('provinces',Province::with('cidades')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.province.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProvinceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProvinceRequest $request)
    {
        try {
            Province::create($request->all());
            session()->flash('success', 'Província criada com sucesso.');
           return redirect()->route('province.index');
       } catch (\Throwable $e) {
           throw $e;
           session()->flash('error', 'Erro na criação da província.');
           return redirect()->route('province.index');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function show(Province $province)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function edit(Province $province)
    {
        return view('backend.province.create_edit')->with('province',$province);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProvinceRequest  $request
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProvinceRequest $request, Province $province)
    {
        try {
            $province->update($request->all());
            session()->flash('success', 'Província actualizada com sucesso.');
            return redirect()->route('province.index');
        } catch (\Throwable $e) {
            session()->flash('error', 'Erro na actualização da província.');
            return redirect()->route('province.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function destroy(Province $province)
    {
        if (!is_null($province) || $province->cidades->isEmpty()) {
            try {
                $province->delete();
                session()->flash('success', 'Província deletada com sucesso.');
                return redirect()->route('province.index');
            } catch (\Throwable $e) {
                session()->flash('error', 'Erro ao deletar província.');
                return redirect()->route('province.index');
            }
        } else {
            session()->flash('error', 'Erro ao deletar: " Contacte o administrador do sistema."');
            return redirect()->route('province.index');
        }
    }
}
