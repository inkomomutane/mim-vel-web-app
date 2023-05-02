<?php

namespace App\Actions\Bairro;

use App\Models\Bairro;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class DeleteBairro
{
    use AsAction;
    use AsController;

    public function handle(Bairro $bairro): bool
    {
        if ($bairro->imovels->isEmpty()) {
            try {
                $bairro->delete();
                flash()->addSuccess('Bairro deletado com sucesso.');

                return true;
            } catch (\Throwable $e) {
                flash()->addError('Erro ao deletar bairro.');

                return false;
            }
        } else {
            flash()->addError('Erro ao deletar: Não pode deletar bairro que possuí imóveis!');

            return false;
        }
    }

    public function AsController(Bairro $bairro)
    {
         $this->handle($bairro);

        return redirect()->back();
    }
}
