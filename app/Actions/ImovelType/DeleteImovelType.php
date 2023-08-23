<?php

namespace App\Actions\ImovelType;

use App\Models\TipoDeImovel;
use App\Support\Enums\SystemRoles;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class DeleteImovelType
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

    public function handle(TipoDeImovel $tipoDeImovel): bool
    {
        if ($tipoDeImovel->imovels->isEmpty()) {
            try {
                $tipoDeImovel->delete();
                flash()->addSuccess('Tipo de imóvel deletado com sucesso.');

                return true;
            } catch (\Throwable $e) {
                flash()->addError('Erro ao deletar: " Contacte o administrador do sistema.".');

                return false;
            }
        } else {
            flash()->addError('Erro ao deletar: Não pode deletar um tipo de imóvel que esta em uso!');

            return false;
        }
    }

    public function AsController(TipoDeImovel $imovelType)
    {
        $this->handle($imovelType);

        return redirect()->back();
    }
}
