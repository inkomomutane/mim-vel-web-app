<?php

namespace App\Actions\Website;

use App\Models\Property;
use Lorisleiva\Actions\Concerns\AsController;

class GetImovel
{
    use AsController;

    public function asController(Property $imovel)
    {
        return view('website.imovel', [
            'imovel' => $imovel->load('media'),
        ]);
    }
}
