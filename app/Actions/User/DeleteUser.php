<?php

namespace App\Actions\User;

use App\Models\User;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class DeleteUser
{
    use AsAction;
    use AsController;

    public function handle(User $user, bool $status)
    {
        $user->active = $status;
        $user->save();

        return $user->active;
    }

    public function rules()
    {
        return [
            'status' => ['required', 'boolean'],
        ];
    }

    public function asController(User $user, ActionRequest $request)
    {
        try {

            if ($this->handle($user, $request->validated('status'))) {
                flash()->addSuccess('Usuário habilitado com sucesso.');
            } else {
                flash()->addSuccess('Usuário desabilitado com sucesso.');
            }
        } catch (\Throwable $th) {
            flash()->addError('Erro ao traocar o estado do usuario'.$th);
        }
    }
}
