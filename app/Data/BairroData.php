<?php

namespace App\Data;

use Spatie\LaravelData\Data;

/** @typescript */
class BairroData extends Data
{
    public function __construct(
      public ?int $id,
      public String $nome,
      public CityData $city
    ) {}
}
