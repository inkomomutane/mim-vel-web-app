<?php

namespace App\Actions\TranstionType;

use App\Models\ImovelFor;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class DeleteTransactionType
{
    use AsAction;
    use AsController;

    public function handle(ImovelFor $imovelFor): bool
    {
        if ($imovelFor->imovels->isEmpty()) {
            try {
                $imovelFor->delete();
                flash()->addSuccess('Tipo de transação deletada com sucesso.');

                return true;
            } catch (\Throwable $e) {
                flash()->addError('Erro ao deletar tipo de transação.');

                return false;
            }
        } else {
            flash()->addError('Erro ao deletar: Não pode deletar tipo de transação que esta sendo usado em imóveis!');

            return false;
        }
    }

    public function AsController(ImovelFor $transactionType)
    {
         $this->handle($transactionType);

        return redirect()->back();
    }
}
