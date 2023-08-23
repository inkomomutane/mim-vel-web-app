<?php

namespace App\Actions\User;

use App\Models\User;
use App\Support\Enums\SystemRoles;
use Illuminate\Validation\Rule;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsController;

class UpdateUser
{
    use AsController;

    public function authorize(ActionRequest $request): bool
    {
        /** @var User $user */
        $user = $request->user();

        return $user->hasAnyRole(
            SystemRoles::SUPERADMIN,
            SystemRoles::ADMIN,
            SystemRoles::SUBADMIN,
            SystemRoles::REALSTATEAGENCY
        );
    }

    public function asController(User $user)
    {
        $validated = request()->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', Rule::unique(User::class,'email')->ignore($user->id,'id')],
            'contacto' => ['nullable', 'string'],
            'role' => ['required', 'numeric'],
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
