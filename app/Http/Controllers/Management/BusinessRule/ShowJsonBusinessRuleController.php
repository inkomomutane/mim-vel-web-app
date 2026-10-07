<?php

namespace App\Http\Controllers\Management\BusinessRule;

use App\Data\BusinessRuleData;
use App\Models\BusinessRule;
use Illuminate\Http\JsonResponse;

class ShowJsonBusinessRuleController
{
    public function __invoke(
        BusinessRule $businessRule,
    ): JsonResponse {
        return response()->json(
            BusinessRuleData::from($businessRule)
        );
    }
}
