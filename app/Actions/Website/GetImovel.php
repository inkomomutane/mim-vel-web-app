<?php

namespace App\Actions\Website;

use App\Models\Imovel;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class GetImovel
{
    use AsController;

    public function asController(Imovel $imovel)
    {
        return view('website.imovel',[
            'imovel' => $imovel
        ]);
    }
}
