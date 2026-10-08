<?php

namespace App\Http\Controllers\Management\PropertyFor;

use App\Data\PropertyForData;
use App\Models\PropertyFor;
use Illuminate\Http\JsonResponse;

class ShowJsonPropertyForController
{
    public function __invoke(
        PropertyFor $propertyFor,
    ): JsonResponse {
        return response()->json(
            PropertyForData::from(
                $propertyFor
            )
        );
    }
}
