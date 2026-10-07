<?php

namespace App\Http\Controllers\Management\City;

use App\Data\CityData;
use App\Models\City;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetSelectedItemCityController
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
                    'province_id',
                ],
                true
            )
        ) {
            return response()->json(null);
        }

        $city = City::query()
            ->with('province')
            ->where(
                $selectedKey,
                $selectedValue
            )
            ->first();

        return response()->json(
            $city
                ? CityData::from([
                'id' => $city->id,
                'name' => $city->name,
                'province_id' => $city->province_id,
                'province_name' => $city->province?->name,
            ])
                : null
        );
    }
}
