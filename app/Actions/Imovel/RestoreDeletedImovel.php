<?php

namespace App\Actions\Imovel;

use App\Models\Property;
use Lorisleiva\Actions\Concerns\AsController;

class RestoreDeletedImovel
{
    use AsController;

    public function AsController(int $imovel)
    {
        /** @var Property $imovel */
        $imovel = Property::onlyTrashed()->whereId($imovel)->first();

        if (! is_null($imovel) && $imovel->trashed()) {
            try {
                $imovel->updated_at = now();
                $imovel->save();
                $imovel->restore();
                flash()->addSuccess('Imovel restorado com sucesso.');

                return to_route('imovel.all');
            } catch (\Throwable $e) {
                throw $e;
                flash()->addError('Erro ao restorar o imovel.');

                return to_route('imovel.all');
            }
        } else {
            flash()->addError('Erro ao restorar imovel: " Contacte o administrador do sistema."');

            return to_route('imovel.all');
        }
    }
}
