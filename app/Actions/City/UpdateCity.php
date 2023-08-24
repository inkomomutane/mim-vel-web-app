<?php

namespace App\Actions\City;

use App\Models\Cidade;
use Illuminate\Validation\Rule;
use Lorisleiva\Actions\Concerns\AsController;

class UpdateCity
{
    use AsController;

    public function asController(Cidade $city)
    {
        $validated = request()->validate([
            'nome' => ['required', Rule::unique(Cidade::class, 'nome')->ignore($city->id, 'id')],
            'province_id' => 'required|numeric',
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
