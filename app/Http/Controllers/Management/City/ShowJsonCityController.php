<?php

namespace App\Http\Controllers\Management\City;

use App\Data\CityData;
use App\Models\City;
use Illuminate\Http\JsonResponse;

class ShowJsonCityController
{
    public function __invoke(
        City $city,
    ): JsonResponse {
        $city->load('province');

        return response()->json(
            CityData::from([
                'id' => $city->id,
                'name' => $city->name,
                'province_id' => $city->province_id,
                'province_name' => $city->province?->name,
            ])
        );
    }
}
