<?php

namespace App\Http\Controllers\Management\Neighborhood;

use App\Data\NeighborhoodData;
use App\Models\Neighborhood;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetSelectedItemNeighborhoodController
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
                true,
            )
        ) {
            return response()->json(null);
        }

        $neighborhood = Neighborhood::query()
            ->with('city.province')
            ->where(
                $selectedKey,
                $selectedValue,
            )
            ->first();

        return response()->json(
            $neighborhood
                ? NeighborhoodData::fromModel(
                $neighborhood
            )
                : null
        );
    }
}
