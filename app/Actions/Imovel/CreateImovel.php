<?php

namespace App\Actions\Imovel;

use App\Data\MultilevelProvinceData;
use App\Data\RegraDeNegocioData;
use App\Data\TransactionTypeData;
use App\Models\ImovelFor;
use App\Models\Province;
use App\Models\RegraDeNegocio;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsController;

class CreateImovel
{
    use AsController;

    public function AsController()
    {
        return Inertia::render('Imovel/CreateImovel', [
            'regrasDeNegocio' => RegraDeNegocioData::collection(RegraDeNegocio::all()),
            'transactionTypes' => TransactionTypeData::collection(ImovelFor::all()),
            'provinces' => MultilevelProvinceData::collection(Province::with('cidades.bairros')->get()),
        ]);
    }
}
