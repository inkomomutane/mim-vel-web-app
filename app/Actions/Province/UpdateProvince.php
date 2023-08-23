<?php

namespace App\Actions\Province;

use App\Models\Province;
use Illuminate\Validation\Rule;
use Lorisleiva\Actions\Concerns\AsController;

class UpdateProvince
{
    use AsController;

    public function asController(Province $province)
    {
        $validated = request()->validate([
            'name' => ['required',Rule::unique(Province::class,'name')->ignore($province->id,'id')],
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
