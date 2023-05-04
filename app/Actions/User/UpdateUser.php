<?php

namespace App\Actions\User;

use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class UpdateUser
{
    use AsController;

    public function asController(User $user)
    {
        $validated = request()->validate([
            'name' => [ 'required', 'string'],
            'email' => ['required', 'string', 'email','unique:users,email,'.$user->id],
            'contacto' => [ 'nullable', 'string'],
            'role' => [ 'required', 'numeric'],
        ]);

        try {
            $user->name = $validated['name'];
            $user->email = $validated['email'];
            $user->contacto = $validated['contacto'];
            $user->syncRoles($validated['role'])
            ->save();

            flash()->addSuccess('Usuário actualizado com sucesso.');
        } catch (\Throwable $th) {
            flash()->addError('Erro na actualização do usuário.');
        }

        return \redirect()->back();
    }
}
