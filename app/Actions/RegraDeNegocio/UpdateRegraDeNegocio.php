<?php

namespace App\Actions\RegraDeNegocio;

use App\Models\RegraDeNegocio;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class UpdateRegraDeNegocio
{
    use AsController;

    function asController(RegraDeNegocio $regraDeNegocio)
    {
        $validated = request()->validate([
            'name' => 'required|unique:regra_de_negocios,name,'. $regraDeNegocio->id,
        ]);

        try {
            $regraDeNegocio->name = $validated['name'];
            $regraDeNegocio->save();
            flash()->addSuccess('Regra de negociação actualizada com sucesso.');
        } catch (\Throwable $th) {
            flash()->addError('Erro na actualização da regra de nociação');
        }
        return \redirect()->back();
    }
}
