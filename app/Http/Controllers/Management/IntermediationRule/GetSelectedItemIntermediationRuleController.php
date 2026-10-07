<?php

namespace App\Http\Controllers\Management\IntermediationRule;

use App\Data\IntermediationRuleData;
use App\Models\IntermediationRule;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetSelectedItemIntermediationRuleController
{
    public function __invoke(
        Request $request,
    ): JsonResponse {
        $selectedKey = $request->input(
            'selected_key'
        );

        $selectedValue = $request->input(
            'selected_value'
        );

        if (
            !$selectedKey ||
            $selectedValue === null ||
            $request->filled('search')
        ) {
            return response()->json(null);
        }

        if (
            !in_array(
                $selectedKey,
                [
                    'id',
                    'name',
                    'code',
                ],
                true
            )
        ) {
            return response()->json(null);
        }

        $intermediationRule = IntermediationRule::query()
            ->where(
                $selectedKey,
                $selectedValue
            )
            ->first();

        return response()->json(
            $intermediationRule
                ? IntermediationRuleData::from(
                $intermediationRule
            )
                : null
        );
    }
}
