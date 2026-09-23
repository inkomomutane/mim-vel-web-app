<?php

namespace App\Actions\Hotel;

use App\Data\AttributeData;
use App\Data\ImovelTypeData;
use App\Data\MultilevelProvinceData;
use App\Data\PropertyConditionData;
use App\Data\StatusData;
use App\Models\Attribute;
use App\Models\PropertyCondition;
use App\Models\PropertyType;
use App\Models\Province;
use App\Models\Status;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsController;

class CreateHotel
{
    use AsController;

    public function AsController(): \Inertia\Response
    {
        return Inertia::render('Hotel/CreateHotel', [
            'provinces' => MultilevelProvinceData::collection(Province::with('cidades.bairros')->get()),
            'imovelsTypes' => ImovelTypeData::collection(PropertyType::all()),
            'imovelConditions' => PropertyConditionData::collection(PropertyCondition::all()),
            'statuses' => StatusData::collection(Status::all()),
            'attributes' => AttributeData::collection(Attribute::with('media')->get()),
        ]);
    }
}
