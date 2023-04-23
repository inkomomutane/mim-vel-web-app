<?php

namespace App\Actions\Status;

use App\Models\Status;
use Lorisleiva\Actions\Concerns\AsController;

class UpdateStatus
{

    use AsController;

    function asController(Status $status)
    {
        $validated = request()->validate([
            'nome' => 'required|unique:statuses,nome,'. $status->id,
        ]);

        try {
            $status->nome = $validated['nome'];
            $status->save();
            flash()->addSuccess('Status actualizado com sucesso.');
        } catch (\Throwable $th) {
            flash()->addError('Erro na actualização do status.');
        }
        return \redirect()->back();
    }
}
