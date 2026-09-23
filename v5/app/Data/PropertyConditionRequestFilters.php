<?php

namespace App\Data;

use Spatie\LaravelData\Data;

/** @typescript */
class PropertyConditionRequestFilters extends Data
{
    public function __construct(
        public ?string $search = null,
        public ?string $sort = null,
        public ?string $per_page = null,
    ) {
    }
}
