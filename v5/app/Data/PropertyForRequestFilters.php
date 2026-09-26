<?php

namespace App\Data;

use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Data;

/**
 * @typescript
 */
class PropertyForRequestFilters extends Data
{
    public function __construct(
        #[Nullable]
        public ?string $search = null,

        #[Nullable]
        public ?string $per_page = '12',

        #[Nullable]
        public ?string $sort = 'name',
    ) {
    }
}
