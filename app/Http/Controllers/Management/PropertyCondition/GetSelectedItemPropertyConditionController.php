<?php

namespace App\Http\Controllers\Management\PropertyCondition;

use App\Data\PropertyConditionData;
use App\Models\PropertyCondition;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetSelectedItemPropertyConditionController
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
                ],
                true
            )
        ) {
            return response()->json(null);
        }

        $propertyCondition = PropertyCondition::query()
            ->where(
                $selectedKey,
                $selectedValue
            )
            ->first();

        return response()->json(
            $propertyCondition
                ? PropertyConditionData::from(
                $propertyCondition
            )
                : null
        );
    }
}
