<?php

namespace App\Actions\Imovel;

use App\Models\Comentario;
use App\Models\Imovel;
use App\Models\Rating;
use Lorisleiva\Actions\Concerns\AsController;

class ApproveImovelDeletion
{
    use AsController;

    public function AsController(int $imovel)
    {
        /** @var Imovel $imovel */
        $imovel = Imovel::onlyTrashed()->whereId($imovel)->first();

        if (! is_null($imovel) && $imovel->trashed()) {
            try {
                Rating::whereIn('id', $imovel->ratings->pluck('id'))->delete();
                Comentario::whereIn('id', $imovel->comentarios->pluck('id'))->delete();
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
