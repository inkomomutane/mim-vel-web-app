<?php

namespace App\Data;

use Spatie\LaravelData\Data;

/** @typescript */
class TransactionTypeData extends Data
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $name,
        public readonly string $slug_text
    ) {
    }
}
