<?php

namespace App\Actions\RegraDeNegocio;

use App\Models\RegraDeNegocio;
use App\Support\Enums\SystemRoles;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class DeleteRegraDeNegocio
{
    use AsAction;
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

    public function handle(RegraDeNegocio $regraDeNegocio): bool
    {
        if ($regraDeNegocio->imovels->isEmpty()) {
            try {
                $regraDeNegocio->delete();
                flash()->addSuccess('Regra de negociação deletada com sucesso.');

                return true;
            } catch (\Throwable $e) {
                flash()->addError('Erro ao deletar regra de nogociação.');

                return false;
            }
        } else {
            flash()->addError('Erro ao deletar: Não pode deletar uma regra de nogociação. que ainda esta em uso nos imóveis.!');

            return false;
        }
    }

    public function AsController(RegraDeNegocio $regraDeNegocio)
    {
        $this->handle($regraDeNegocio);

        return redirect()->back();
    }
}
