<?php

namespace App\Actions\Condicao;

use App\Data\PropertyConditionData;
use App\Models\PropertyCondition;
use App\Support\Enums\SystemRoles;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class CreateCondicao
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

    public function handle(PropertyConditionData $condicaoData)
    {
        return PropertyCondition::create($condicaoData->all());
    }

    public function rules()
    {
        return [
            'nome' => 'required|unique:condicaos,nome',
        ];
    }

    public function AsController(ActionRequest $request)
    {
        $this->handle(PropertyConditionData::from($request->validated()));
        flash()->addSuccess('Condição do imóvel criada com sucesso.');

        return \redirect()->back();
    }
}
