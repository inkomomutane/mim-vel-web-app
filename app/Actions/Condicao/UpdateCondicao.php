<?php

namespace App\Actions\Condicao;

use App\Models\Condicao;
use Lorisleiva\Actions\Concerns\AsController;

class UpdateCondicao
{
    use AsController;

    function asController(Condicao $condicao)
    {
        $validated = request()->validate([
            'nome' => 'required|unique:condicaos,nome,'. $condicao->id,
        ]);

        try {
            $condicao->nome = $validated['nome'];
            $condicao->save();
            flash()->addSuccess('Condição do imóvel actualizado com sucesso.');
        } catch (\Throwable $th) {
            flash()->addError('Erro na actualização da condição do imóvel.');
        }
        return \redirect()->back();
    }
}
