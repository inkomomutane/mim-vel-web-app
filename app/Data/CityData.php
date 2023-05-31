<?php

namespace App\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Lazy;

/** @typescript */
class CityData extends Data
{
    public function __construct(
        public ?int $id,
        public string $nome,
        public Lazy|ProvinceData|null $province = null,
        /** @var BairroData[] */
        public Lazy|null|DataCollection $bairros
    ) {
    }
}
