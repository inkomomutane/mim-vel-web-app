<?php

namespace App\Actions\Imovel;

use App\Models\Imovel;
use Lorisleiva\Actions\Concerns\AsAction;

class RefuseImovel
{
    use AsAction;

    public function handle(Imovel $imovel): bool
    {
        try {
            $imovel->delete();

            return true;
        } catch (\Throwable $th) {
            return false;
        }

        return false;
    }
}
