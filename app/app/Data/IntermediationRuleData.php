<?php

namespace App\Data;

use Spatie\LaravelData\Data;

/** @typescript */
class IntermediationRuleData extends Data
{
    public function __construct(
        public int $id,
        public string $name,
        public string $code,
        public float $percentage
    ) {
    }
}
