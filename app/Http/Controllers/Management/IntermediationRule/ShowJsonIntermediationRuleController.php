<?php

namespace App\Http\Controllers\Management\IntermediationRule;

use App\Data\IntermediationRuleData;
use App\Models\IntermediationRule;
use Illuminate\Http\JsonResponse;

class ShowJsonIntermediationRuleController
{
    public function __invoke(
        IntermediationRule $intermediationRule,
    ): JsonResponse {
        return response()->json(
            IntermediationRuleData::from(
                $intermediationRule
            )
        );
    }
}
