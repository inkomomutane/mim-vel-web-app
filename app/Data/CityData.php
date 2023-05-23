<?php

namespace App\Data;

use Spatie\LaravelData\Data;

/** @typescript */
class CityData extends Data
{
    public function __construct(
        public ?int $id,
        public string $nome,
        public ProvinceData|null $province = null
    ) {
    }
}
