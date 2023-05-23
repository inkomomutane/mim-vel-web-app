<?php

namespace App\Data;

use Spatie\LaravelData\Data;

/** @typescript */
class PolicyData extends Data
{
    public function __construct(
        public readonly string $politicas
    ) {
    }
}
