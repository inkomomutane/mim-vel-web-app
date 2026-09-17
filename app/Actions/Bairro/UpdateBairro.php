<?php

namespace App\Actions\Bairro;

use App\Models\Neighborhood;
use Illuminate\Validation\Rule;
use Lorisleiva\Actions\Concerns\AsController;

class UpdateBairro
{
    use AsController;

    public function asController(Neighborhood $bairro)
    {
        $validated = request()->validate([
            'nome' => ['required', Rule::unique(Neighborhood::class, 'nome')->ignore($bairro->id, 'id')],
            'cidade_id' => 'required|numeric',
        ]);

        try {

            $bairro->nome = $validated['nome'];
            $bairro->cidade_id = $validated['cidade_id'];
            $bairro->save();

            flash()->addSuccess('Bairro actualizado com sucesso.');
        } catch (\Throwable $th) {
            throw $th;
            flash()->addError('Erro na actualização do bairro.');
        }

        return \redirect()->back();
    }
}
