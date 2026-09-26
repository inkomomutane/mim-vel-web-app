<?php

namespace App\Actions\Imovel;

use App\Data\ImovelTypeData;
use App\Data\IntermediationRuleData;
use App\Data\MultilevelProvinceData;
use App\Data\PropertyConditionData;
use App\Data\BusinessRuleData;
use App\Data\StatusData;
use App\Data\TransactionTypeData;
use App\Models\BusinessRule;
use App\Models\IntermediationRule;
use App\Models\PropertyCondition;
use App\Models\PropertyFor;
use App\Models\PropertyType;
use App\Models\Province;
use App\Models\Status;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsController;

class CreateImovel
{
    use AsController;

    public function AsController()
    {
        return Inertia::render('Imovel/CreateImovel', [
            'regrasDeNegocio' => BusinessRuleData::collection(BusinessRule::all()),
            'transactionTypes' => TransactionTypeData::collection(PropertyFor::all()),
            'provinces' => MultilevelProvinceData::collection(Province::with('cidades.bairros')->get()),
            'imovelsTypes' => ImovelTypeData::collection(PropertyType::all()),
            'imovelConditions' => PropertyConditionData::collection(PropertyCondition::all()),
            'statuses' => StatusData::collection(Status::all()),
            'intermediationRules' => IntermediationRuleData::collection(IntermediationRule::all()),
        ]);
    }
}
