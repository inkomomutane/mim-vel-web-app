<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\Create;
use App\Http\Requests\User\Delete;
use App\Http\Requests\User\Update;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $users = User::all();

            return view('backend.user')->with(['users' => $users,'roles'=>Role::all()]);

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
            $data = $request->all();

            $dataCreate  = array();
            foreach ($data as $key => $value) {
                if ($key == "password"  || $key == "password_confirmation" && $value) {
                    $value = Hash::make($value);
                }
                if ($value && $key!='roles') {
                    $dataCreate[$key] = $value;
                }
            }
            $user = User::create($dataCreate);
            $user->syncRoles([$request->roles]);
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
        if ($user->id == Auth::user()->id) {
            return view('backend.profile')->with('user',$user);
        }else{
            return abort(404);
        }

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
     * @param  \App\Http\Requests\User\Update  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request, User $user)
    {
        $data = $request->all();

        $dataUpdate  = array();
        foreach ($data as $key => $value) {
            if ($key == "password" && $value) {
                $value = Hash::make($value);
            }
            if ($value) {
                $dataUpdate[$key] = $value;
            }
        }
        try {
            $user->update($dataUpdate);
            session()->flash('success', 'User actualizado com sucesso.');
            return redirect()->route('user.index');
        } catch (\Throwable $e) {
            dd($e);
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
    public function destroy(Delete $request, User $user)
    {

        if ($user && $user->imovels->count() == 0 ) {
            try {
                $user->delete();
                session()->flash('success', 'Usuário deletado com sucesso.');
                return redirect()->route('user.index');
            } catch (\Throwable $e) {
                session()->flash('error', 'Erro ao deletar user.');
                return redirect()->route('user.index');
            }
        } else {
            session()->flash('error', 'Erro ao deletar: " O usuário esta sendo usado em um imóvel ou contacte o administrador do sistema."');
            return redirect()->route('user.index');
        }
    }
}
