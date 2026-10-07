<?php

namespace App\Http\Controllers\Management\Neighborhood;

use App\Data\NeighborhoodData;
use App\Models\Neighborhood;
use Illuminate\Http\JsonResponse;

class ShowJsonNeighborhoodController
{
    public function __invoke(
        Neighborhood $neighborhood,
    ): JsonResponse {
        $neighborhood->load(
            'city.province'
        );

        return response()->json(
            NeighborhoodData::fromModel(
                $neighborhood
            )
        );
    }
}
