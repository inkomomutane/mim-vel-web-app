<?php

namespace App\Http\Controllers\Management\PropertyCondition;

use App\Data\PropertyConditionData;
use App\Models\PropertyCondition;
use Illuminate\Http\JsonResponse;

class ShowJsonPropertyConditionController
{
    public function __invoke(
        PropertyCondition $propertyCondition,
    ): JsonResponse {
        return response()->json(
            PropertyConditionData::from(
                $propertyCondition
            )
        );
    }
}
