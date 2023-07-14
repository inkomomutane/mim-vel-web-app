<?php

namespace App\Actions\IntermediationRule;

use App\Models\IntermediationRule;
use Lorisleiva\Actions\Concerns\AsController;

class DeleteIntermediationRule
{
    use AsController;

    public function AsController(IntermediationRule $intermediation)
    {
        if ($intermediation->imovels->isEmpty()) {
            try {
                $intermediation->delete();
                flash()->addSuccess('Regra de intermediação deletada com sucesso.');
            } catch (\Throwable $e) {
                flash()->addError('Erro ao deletar: " Contacte o administrador do sistema.".');
            }
        } else {

            flash()->addError('Erro ao deletar: Não pode deletar uma regra de intermediação que esta em uso!');
        }

        return redirect()->back();
    }
}
