<?php

namespace App\Actions\Imovel;

use App\Data\CondicaoData;
use App\Data\ImovelTypeData;
use App\Data\IntermediationRuleData;
use App\Data\MultilevelProvinceData;
use App\Data\RegraDeNegocioData;
use App\Data\StatusData;
use App\Data\TransactionTypeData;
use App\Models\Condicao;
use App\Models\ImovelFor;
use App\Models\IntermediationRule;
use App\Models\Province;
use App\Models\RegraDeNegocio;
use App\Models\Status;
use App\Models\TipoDeImovel;
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
            'imovelsTypes' => ImovelTypeData::collection(TipoDeImovel::all()),
            'imovelConditions' => CondicaoData::collection(Condicao::all()),
            'statuses' => StatusData::collection(Status::all()),
            'intermediationRules' => IntermediationRuleData::collection(IntermediationRule::all()),
        ]);
    }
}
