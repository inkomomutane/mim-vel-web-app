<?php

namespace App\Actions\Status;

use App\Data\StatusData;
use App\Models\Status;
use App\Support\Enums\SystemRoles;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class CreateStatus
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

    public function handle(StatusData $statusData)
    {
        return Status::create($statusData->all());
    }

    public function rules()
    {
        return [
            'nome' => 'required|unique:statuses,nome',
        ];
    }

    public function AsController(ActionRequest $request)
    {
        $this->handle(StatusData::from($request->validated()));
        flash()->addSuccess('Status criado com sucesso.');

        return \redirect()->back();
    }
}
