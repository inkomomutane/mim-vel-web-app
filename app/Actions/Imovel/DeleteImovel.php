<?php

namespace App\Actions\Imovel;

use App\Models\Imovel;
use Lorisleiva\Actions\Concerns\AsController;

class DeleteImovel
{
    use AsController;

    public function AsController(Imovel $imovel)
    {
        if (! is_null($imovel)) {
            try {
                $imovel->delete();
                flash()->addSuccess('Imovel deletado com sucesso.');

                return to_route('imovel.all');
            } catch (\Throwable $e) {
                throw $e;
                flash()->addError('Erro ao deletar imovel.');

                return to_route('imovel.all');
            }
        } else {
            flash()->addError('error', 'Erro ao deletar: " Contacte o administrador do sistema."');

            return to_route('imovel.all');
        }
    }
}
