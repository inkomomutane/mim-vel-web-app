<?php

namespace App\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Lazy;

/** @typescript */
class MultilevelProvinceData extends Data
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        /** @var CityData[] */
        public readonly Lazy|DataCollection $cidades
    ) {
    }
}
