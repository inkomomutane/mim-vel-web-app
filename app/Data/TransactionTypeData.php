<?php

namespace App\Data;

use Spatie\LaravelData\Data;

/** @typescript */
class TransactionTypeData extends Data
{
    public function __construct(
        public readonly ?int $id,
        public readonly String $name,
        public readonly String $slug_text
    ) {}
}
