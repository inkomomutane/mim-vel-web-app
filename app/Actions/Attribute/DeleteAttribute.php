<?php

namespace App\Actions\Attribute;

use App\Models\Attribute;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class DeleteAttribute
{
    use AsAction;
    use AsController;

    public function handle(Attribute $attribute): bool
    {
        if ($attribute->hotels->isEmpty()) {
            try {
                $attribute->delete();
                flash()->addSuccess('Attributo deletado com sucesso.');

                return true;
            } catch (\Throwable $e) {
                flash()->addError('Erro ao deletar attributo.');

                return false;
            }
        } else {
            flash()->addError('Erro ao deletar: Não pode deletar attributo que possuí imóveis!');

            return false;
        }
    }

    public function asController(Attribute $attribute)
    {
        $this->handle($attribute);

        return redirect()->back();
    }
}
