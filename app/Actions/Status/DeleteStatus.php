<?php

namespace App\Actions\Status;

use App\Models\Status;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class DeleteStatus
{
    use AsAction;
    use AsController;

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
