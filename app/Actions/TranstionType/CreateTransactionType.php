<?php

namespace App\Actions\TranstionType;

use App\Data\TransactionTypeData;
use App\Models\ImovelFor;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class CreateTransactionType
{
    use AsAction;
    use AsController;

    public function handle(TransactionTypeData $transactionTypeData)
    {
        return ImovelFor::create($transactionTypeData->all());
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:imovel_fors,name',
            'slug_text' => 'required|unique:imovel_fors,slug_text',
        ];
    }

    public function AsController(ActionRequest $request)
    {
        $this->handle(TransactionTypeData::from($request->validated()));
        flash()->addSuccess('Tipo de transação criada com sucesso.');

        return \redirect()->back();
    }
}
