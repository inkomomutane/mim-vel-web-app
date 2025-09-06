<?php

namespace App\Actions\Condicao;

use App\Data\CondicaoData;
use App\Models\Condicao;
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

    public function handle(CondicaoData $condicaoData)
    {
        return Condicao::create($condicaoData->all());
    }

    public function rules()
    {
        return [
            'nome' => 'required|unique:condicaos,nome',
        ];
    }

    public function AsController(ActionRequest $request)
    {
        $this->handle(CondicaoData::from($request->validated()));
        flash()->addSuccess('Condição do imóvel criada com sucesso.');

        return \redirect()->back();
    }
}
