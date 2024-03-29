<?php

namespace App\Actions\Condicao;

use App\Models\Condicao;
use App\Support\Enums\SystemRoles;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class DeleteCondicao
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

    public function handle(Condicao $condicao): bool
    {
        if ($condicao->imovels->isEmpty()) {
            try {
                $condicao->delete();
                flash()->addSuccess('Condição do imovel deletada com sucesso.');

                return true;
            } catch (\Throwable $e) {
                flash()->addError('Erro ao deletar condição do imovel.');

                return false;
            }
        } else {
            flash()->addError('Erro ao deletar: Não pode deletar uma condição de imovel que esta sendo usado em imóveis!');

            return false;
        }
    }

    public function AsController(Condicao $condicao)
    {
        $this->handle($condicao);

        return redirect()->back();
    }
}
