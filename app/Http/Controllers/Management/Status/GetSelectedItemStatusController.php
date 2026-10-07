<?php

namespace App\Http\Controllers\Management\Status;

use App\Data\StatusData;
use App\Models\Status;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetSelectedItemStatusController
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

        $status = Status::query()
            ->where(
                $selectedKey,
                $selectedValue,
            )
            ->first();

        return response()->json(
            $status
                ? StatusData::from($status)
                : null
        );
    }
}
