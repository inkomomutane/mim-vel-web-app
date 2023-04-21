<?php

namespace App\Actions\City;

use App\Models\Cidade;
use Lorisleiva\Actions\Concerns\AsController;

class UpdateCity
{
    use AsController;

    function asController(Cidade $city)
    {
        $validated = request()->validate([
            'nome' => 'required|unique:cidades,nome,'. $city->id,
            'province_id' => 'required|numeric'
        ]);

        try {
            $city->nome = $validated['nome'];
            $city->province_id = $validated['province_id'];
            $city->save();
            flash()->addSuccess('Cidade actualizada com sucesso.');
        } catch (\Throwable $th) {
            throw $th;
            flash()->addError('Erro na actualização da cidade.');
        }
        return \redirect()->back();
    }
}
