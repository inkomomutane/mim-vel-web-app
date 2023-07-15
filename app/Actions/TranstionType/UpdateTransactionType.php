<?php

namespace App\Actions\TranstionType;

use App\Models\ImovelFor;
use Lorisleiva\Actions\Concerns\AsController;

class UpdateTransactionType
{
    use AsController;

    public function asController(ImovelFor $transactionType)
    {
        $validated = request()->validate([
            'name' => 'required|unique:imovel_fors,name,'.$transactionType->id,
            'slug_text' => 'required|unique:imovel_fors,slug_text,'.$transactionType->id,
        ]);

        try {
            $transactionType->name = $validated['name'];
            $transactionType->slug_text = $validated['slug_text'];
            $transactionType->save();
            flash()->addSuccess('Tipo de transação actualizada com sucesso.');
        } catch (\Throwable $th) {
            flash()->addError('Erro na actualização do tipo de transação.');
        }

        return \redirect()->back();
    }
}