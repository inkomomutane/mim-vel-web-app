<?php

namespace App\Http\Controllers\Management\PropertyFor;

use App\Data\TransactionTypeData;
use App\Models\PropertyFor;
use Illuminate\Http\JsonResponse;

class ShowJsonPropertyForController
{
    public function __invoke(
        PropertyFor $propertyFor,
    ): JsonResponse {
        return response()->json(
            TransactionTypeData::from(
                $propertyFor
            )
        );
    }
}
