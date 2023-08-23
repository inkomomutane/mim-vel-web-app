<?php

namespace App\Actions\Status;

use App\Models\Status;
use App\Support\Enums\SystemRoles;
use Illuminate\Validation\Rule;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsController;

class UpdateStatus
{
    use AsController;

    public function authorize(ActionRequest $request): bool
    {
        /** @var User $user */
        $user = $request->user();

        return $user->hasAnyRole(
            SystemRoles::SUPERADMIN,
            SystemRoles::ADMIN
        );
    }

    public function asController(Status $status)
    {
        $validated = request()->validate([
            'nome' => ['required',Rule::unique(Status::class,'nome')->ignore($status->id,'id')]
        ]);

        try {
            $status->nome = $validated['nome'];
            $status->save();
            flash()->addSuccess('Status actualizado com sucesso.');
        } catch (\Throwable $th) {
            flash()->addError('Erro na actualização do status.');
        }

        return \redirect()->back();
    }
}
