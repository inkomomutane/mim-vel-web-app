<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\Create;
use App\Models\Role;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.user')->with(['users'=> User::all(),'roles'=> Role::all()]);
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
     * @param  \App\Http\Requests\User\Create  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Create $request)
    {
        try {
            User::create($request->all());
            session()->flash('success', 'User criado com sucesso.');
            return redirect()->route('user.index');
        } catch (\Throwable $e) {
            session()->flash('error', 'Erro na criação do user.');
            return redirect()->route('user.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Create $request, User $user)
    {
        try {
            $user->update($request->all());
            session()->flash('success', 'User actualizado com sucesso.');
            return redirect()->route('user.index');
        } catch (\Throwable $e) {
            session()->flash('error', 'Erro na actualização do user.');
            return redirect()->route('user.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {


        if ($user && $user->imovels->count() == 0) {
            try {
                $user->delete();
                session()->flash('success', 'User deletado com sucesso.');
                return redirect()->route('user.index');
            } catch (\Throwable $e) {
                session()->flash('error', 'Erro ao deletar user.');
                return redirect()->route('user.index');
            }
        } else {
            session()->flash('error', 'Erro ao deletar: " O user esta sendo usado em um imóvel."');
            return redirect()->route('user.index');
        }
    }
}
