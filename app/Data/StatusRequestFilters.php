<?php

namespace App\Data;

use Spatie\LaravelData\Data;

/** @typescript */
class StatusRequestFilters extends Data
{
    public function __construct(
        public ?string $search = null,
        public ?string $per_page = null,
        public ?string $sort = null,
    ) {
    }
}
