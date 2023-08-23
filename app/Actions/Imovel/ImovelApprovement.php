<?php

namespace App\Actions\Imovel;

use App\Models\Imovel;
use App\Support\Enums\SystemRoles;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsController;

class ImovelApprovement
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
        );
    }

    public function rules()
    {
        return [
            'approve' => 'required|boolean',
        ];
    }

    public function asController(Imovel $imovel, ActionRequest $actionRequest)
    {
        if ($actionRequest->approve) {
            ApproveImovel::run($imovel);
            flash()->addSuccess('Imovel approvado com sucesso.');
        } else {
            RefuseImovel::run($imovel);

            flash()->addError('Imovel recusado e removido automaticamente.');
        }

        return \back();
    }
}
