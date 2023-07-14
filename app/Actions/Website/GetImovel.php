<?php

namespace App\Actions\Website;

use App\Data\ImovelTypeData;
use App\Models\Imovel;
use App\Models\TipoDeImovel;
use Lorisleiva\Actions\Concerns\AsController;

class GetImovel
{
    use AsController;

    public function asController(Imovel $imovel)
    {
        return view('website.imovel', [
            'imovel' => $imovel->load('media'),
        ]);
    }
}
