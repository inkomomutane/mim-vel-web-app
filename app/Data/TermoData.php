<?php

namespace App\Data;

use Spatie\LaravelData\Data;

/** @typescript */
class TermoData extends Data
{
    public function __construct(
     public String $termos
    ) {}
}
