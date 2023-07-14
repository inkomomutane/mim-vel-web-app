<?php

namespace App\Actions\User;

use App\Models\User;
use Auth;
use Hash;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;
use Spatie\Permission\Models\Role;

class CreateUser
{
    use AsAction;
    use AsController;

    public function handle(array $userData)
    {
        return User::create([
            'name' => $userData['name'],
            'email' => $userData['email'],
            'contacto' => $userData['contacto'],
            'password' => Hash::make('12345678'),
            'created_by_id' => Auth::user()->id,
        ])->assignRole(Role::findById($userData['role']));
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users,email'],
            'contacto' => ['nullable', 'string'],
            'role' => ['required', 'numeric'],
        ];
    }

    public function AsController(ActionRequest $request)
    {
        try {
            $this->handle($request->validated());
            flash()->addSuccess('Usuario criado com sucesso.');
        } catch (\Throwable $th) {
            flash()->addError('Erro ao criar usuário.');
        }

         return \redirect()->back();
    }
}
