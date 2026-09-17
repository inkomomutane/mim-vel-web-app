<?php

namespace App\Actions\RegraDeNegocio;

use App\Models\BusinessRule;
use App\Support\Enums\SystemRoles;
use Illuminate\Validation\Rule;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsController;

class UpdateRegraDeNegocio
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

    public function asController(BusinessRule $regraDeNegocio)
    {
        $validated = request()->validate([
            'name' => ['required', Rule::unique(BusinessRule::class, 'name')->ignore($regraDeNegocio->id, 'id')],
        ]);

        try {
            $regraDeNegocio->name = $validated['name'];
            $regraDeNegocio->save();
            flash()->addSuccess('Regra de negociação actualizada com sucesso.');
        } catch (\Throwable $th) {
            flash()->addError('Erro na actualização da regra de nociação');
        }

        return \redirect()->back();
    }
}
