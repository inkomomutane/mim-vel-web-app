<?php

namespace App\Http\Controllers\Management\Province;

use App\Data\ProvinceData;
use App\Models\Province;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetSelectedItemProvinceController
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

        $province = Province::query()
            ->where(
                $selectedKey,
                $selectedValue
            )
            ->first();

        return response()->json(
            $province
                ? ProvinceData::from($province)
                : null
        );
    }
}
