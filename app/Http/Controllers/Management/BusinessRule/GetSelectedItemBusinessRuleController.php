<?php

namespace App\Http\Controllers\Management\BusinessRule;

use App\Data\BusinessRuleData;
use App\Models\BusinessRule;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetSelectedItemBusinessRuleController
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
                ['id', 'name'],
                true
            )
        ) {
            return response()->json(null);
        }

        $businessRule = BusinessRule::query()
            ->where(
                $selectedKey,
                $selectedValue
            )
            ->first();

        return response()->json(
            $businessRule
                ? BusinessRuleData::from($businessRule)
                : null
        );
    }
}
