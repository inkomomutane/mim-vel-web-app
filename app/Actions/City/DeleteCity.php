<?php

namespace App\Actions\City;

use App\Models\Cidade;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class DeleteCity
{
    use AsAction;
    use AsController;

    public function handle(Cidade $city):bool
    {
        if ($city->bairros->isEmpty()) {
            try {
                $city->delete();
                flash()->addSuccess('Cidade deletada com sucesso.');
                return true;
            } catch (\Throwable $e) {
                flash()->addError('Erro ao deletar: " Contacte o administrador do sistema.".');
                return false;
            }
        } else {
            flash()->addError('Erro ao deletar: Não pode deletar Cidade que possuí bairros!');
            return false;
        }
    }

    public function AsController(Cidade $city){
         $this->handle($city);
        return redirect()->back();
    }
}
