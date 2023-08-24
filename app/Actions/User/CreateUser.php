<?php

namespace App\Actions\User;

use App\Models\User;
use App\Support\Enums\SystemRoles;
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

    public function handle(array $userData)
    {
        $user = User::create([
            'name' => $userData['name'],
            'email' => $userData['email'],
            'contacto' => $userData['contacto'],
            'password' => Hash::make('12345678'),
            'created_by_id' => Auth::user()->id,
        ]);
        /** @var User $user */
        $user = User::whereId($user->id)->first();
        $user->assignRole(Role::findById($userData['role']));
        $user->parent()->associate($user->createdBy)->save();

        return $user;
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
