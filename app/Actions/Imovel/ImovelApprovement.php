<?php

namespace App\Actions\Imovel;

use App\Models\Imovel;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsController;

class ImovelApprovement
{
    use AsController;

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
