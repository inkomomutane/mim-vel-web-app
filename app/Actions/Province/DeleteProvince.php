<?php

namespace App\Actions\Province;

use App\Models\Province;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class DeleteProvince
{
    use AsAction;
    use AsController;

    public function handle(Province $province): bool
    {
        if ($province->cidades->isEmpty()) {
            try {
                $province->delete();
                flash()->addSuccess('Província deletada com sucesso.');

                return true;
            } catch (\Throwable $e) {
                flash()->addError('Erro ao deletar: " Contacte o administrador do sistema."');

                return false;
            }
        } else {
            flash()->addError('Erro ao deletar: Não pode deletar província que possuí cidades!');

            return false;
        }
    }

    public function AsController(Province $province)
    {
         $this->handle($province);

        return redirect()->back();
    }
}
