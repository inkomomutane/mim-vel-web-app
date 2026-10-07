<?php

namespace App\Http\Controllers\Management\PropertyFor;

use App\Data\TransactionTypeData;
use App\Models\PropertyFor;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetSelectedItemPropertyForController
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
                    'slug',
                ],
                true
            )
        ) {
            return response()->json(null);
        }

        $propertyFor = PropertyFor::query()
            ->where(
                $selectedKey,
                $selectedValue
            )
            ->first();

        return response()->json(
            $propertyFor
                ? TransactionTypeData::from(
                $propertyFor
            )
                : null
        );
    }
}
