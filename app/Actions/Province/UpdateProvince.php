<?php

namespace App\Actions\Province;

use App\Models\Province;
use Lorisleiva\Actions\Concerns\AsController;

class UpdateProvince
{
    use AsController;

    function asController(Province $province)
    {
        $validated = request()->validate([
            'name' => 'required|unique:provinces,name,'. $province->id,
        ]);

        try {
            $province->name = $validated['name'];
            $province->save();
            flash()->addSuccess('Província actualizada com sucesso.');
        } catch (\Throwable $th) {
            flash()->addError('Erro na actualização da província.');
        }
        return \redirect()->back();
    }
}
