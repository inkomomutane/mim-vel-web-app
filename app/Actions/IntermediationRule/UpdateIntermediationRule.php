<?php

namespace App\Actions\IntermediationRule;

use App\Models\IntermediationRule;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsController;

class UpdateIntermediationRule
{
    use AsController;

    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'code' => ['required', 'string'],
            'percentage' => ['required', 'numeric'],
        ];
    }

    public function AsController(IntermediationRule $intermediation, ActionRequest $actionRequest)
    {
        try {
            $intermediation->name = $actionRequest->name;
            $intermediation->code = $actionRequest->code;
            $intermediation->percentage = $actionRequest->percentage;
            $intermediation->save();

            flash()->addSuccess('Regra de intermediação actualizada com sucesso');
        } catch (\Throwable $th) {
            flash()->addError('Erro ao actualizar regra de intermediação.');
        }

        return \redirect()->back();

    }
}
