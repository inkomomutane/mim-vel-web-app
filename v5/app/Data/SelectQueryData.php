<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class SelectQueryData extends Data
{
    public function __construct(
        public string $selectedKey,
        public ?array $selectedValues = [],
        public ?string $search = '',
        public int $page = 1,
    ){}
}
