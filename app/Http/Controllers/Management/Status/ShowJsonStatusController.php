<?php

namespace App\Http\Controllers\Management\Status;

use App\Data\StatusData;
use App\Models\Status;
use Illuminate\Http\JsonResponse;

class ShowJsonStatusController
{
    public function __invoke(
        Status $status,
    ): JsonResponse {
        return response()->json(
            StatusData::from($status)
        );
    }
}
