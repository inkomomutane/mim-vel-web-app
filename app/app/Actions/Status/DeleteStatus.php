<?php

namespace App\Actions\Status;

use App\Models\Status;
use App\Support\Enums\SystemRoles;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class DeleteStatus
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

    public function handle(Status $status): bool
    {
        if ($status->imovels->isEmpty()) {
            try {
                $status->delete();
                flash()->addSuccess('Status deletado com sucesso.');

                return true;
            } catch (\Throwable $e) {
                flash()->addError('Erro ao deletar status.');

                return false;
            }
        } else {
            flash()->addError('Erro ao deletar: Não pode deletar status que esta sendo usado em imóveis!');

            return false;
        }
    }

    public function AsController(Status $status)
    {
        $this->handle($status);

        return redirect()->back();
    }
}
