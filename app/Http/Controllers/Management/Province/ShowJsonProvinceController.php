<?php

namespace App\Http\Controllers\Management\Province;

use App\Data\ProvinceData;
use App\Models\Province;
use Illuminate\Http\JsonResponse;

class ShowJsonProvinceController
{
    public function __invoke(
        Province $province,
    ): JsonResponse {
        return response()->json(
            ProvinceData::from(
                $province
            )
        );
    }
}
