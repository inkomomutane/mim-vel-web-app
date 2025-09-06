<?php

namespace App\Actions\IntermediationRule;

use App\Models\IntermediationRule;
use App\Support\Enums\SystemRoles;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsController;

class CreateIntermediationRule
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

    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'code' => ['required', 'string'],
            'percentage' => ['required', 'numeric'],
        ];
    }

    public function AsController(ActionRequest $actionRequest)
    {
        try {
            IntermediationRule::create([
                'name' => $actionRequest->name,
                'code' => $actionRequest->code,
                'percentage' => $actionRequest->percentage,
            ]);

            flash()->addSuccess('Regra de intermediação criada com sucesso');
        } catch (\Throwable $th) {
            flash()->addError('Erro ao criar regra de intermediação.');
        }

        return \redirect()->back();
    }
}
