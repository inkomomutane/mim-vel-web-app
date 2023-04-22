<?php

namespace App\Data;

use Spatie\LaravelData\Data;

/** @typescript */
class TermAndConditionData extends Data
{
    public function __construct(
       public readonly String $term
    ) {}
}
