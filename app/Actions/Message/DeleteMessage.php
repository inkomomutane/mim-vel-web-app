<?php

namespace App\Actions\Message;

use App\Models\Agenda;
use Lorisleiva\Actions\Concerns\AsController;

class DeleteMessage
{
    use AsController;

    public function AsController(Agenda $agenda)
    {
        try {
            $agenda->delete();
            flash()->addSuccess('Mensagem deletada com sucesso.');
        } catch (\Throwable $th) {
            flash()->addError('Erro ao deletar mensagem!');
        }

        return back();
    }
}
