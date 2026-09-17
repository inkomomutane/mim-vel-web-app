<?php

namespace App\Actions\Imovel;

use App\Models\Comment;
use App\Models\Property;
use App\Models\Rating;
use App\Support\Enums\SystemRoles;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsController;

class ApproveImovelDeletion
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

    public function AsController(int $imovel)
    {
        /** @var Property $imovel */
        $imovel = Property::onlyTrashed()->whereId($imovel)->first();

        if (! is_null($imovel) && $imovel->trashed()) {
            try {
                Rating::whereIn('id', $imovel->ratings->pluck('id'))->delete();
                Comment::whereIn('id', $imovel->comentarios->pluck('id'))->delete();
                $imovel->forceDelete();
                flash()->addSuccess('Imovel deletado permanentemente com sucesso.');

                return to_route('imovel.all.trash');
            } catch (\Throwable $e) {
                throw $e;
                flash()->addError('Erro ao deletar permanentemente o imovel.');

                return to_route('imovel.all.trash');
            }
        } else {
            flash()->addError('Erro ao deletar: " Contacte o administrador do sistema."');

            return to_route('imovel.all.trash');
        }
    }
}
