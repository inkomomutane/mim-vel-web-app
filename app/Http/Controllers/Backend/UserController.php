<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\UserRequest;
use App\Http\Requests\Dashboard\UserRequestEdit;
use App\Http\Requests\User\UserCreateRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index():View
    {
        return view('backend.user.index')->with('users',User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create() : View
    {
        return view('backend.user.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserRequest $request
     * @return Response
     */
    public function store(UserCreateRequest $request)
    {
        try {
            $data = $request->all();

            $dataCreate  = array('created_by_id' => auth()->user()->id);
            foreach ($data as $key => $value) {
                if ($key == "password"  || $key == "password_confirmation" && $value) {
                    $value = Hash::make($value);
                }
                if (!is_null($value)) {
                    $dataCreate[$key] = $value;
                }
            }
             $user = User::create($dataCreate);
             $user->assignRole(Role::where('id',$request->role_id)->pluck('name')->toArray());
            $this->flasher->addFlash('success', 'User criado com sucesso.');
            return redirect()->route('user.index');
        } catch (\Throwable $e) {
            throw $e;
            $this->flasher->addFlash('error', 'Erro na criação do user.');
            return redirect()->route('user.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function show(User $user)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function edit(User $user) : View
    {
        return view('backend.user.create_edit')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserRequestEdit  $request
     * @param User $user
     * @return Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $data = $request->all();

        $dataUpdate  = array();
        foreach ($data as $key => $value) {
            if ($key == "password" && $value) {
                $value = Hash::make($value);
            }
            if (!is_null($value)) {
                $dataUpdate[$key] = $value;
            }
        }
        try {
            $user->update($dataUpdate);
            $user->syncRoles([]);
            $user->assignRole(Role::where('id',$request->role_id)->pluck('name')->toArray());
            $this->flasher->addFlash('success', 'User actualizado com sucesso.');
            return redirect()->route('user.index');
        } catch (\Throwable $e) {
            $this->flasher->addFlash('error', 'Erro na actualização do user.');
            return redirect()->route('user.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return Response
     */
    public function destroy(User $user)
    {
        if (!is_null($user) && $user->imovels->isEmpty()) {
            try {
                $user->syncRoles([]);
                $user->delete();
                $this->flasher->addFlash('success', 'Usuário deletado com sucesso.');
                return redirect()->route('user.index');
            } catch (\Throwable $e) {
                $this->flasher->addFlash('error', 'Erro ao deletar user.');
                return redirect()->route('user.index');
            }
        } else {
            $this->flasher->addFlash('error', 'Erro ao deletar: " Contacte o administrador do sistema."');
            return redirect()->route('user.index');
        }
    }
}
