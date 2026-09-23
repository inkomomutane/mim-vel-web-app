<?php

namespace App\Data;
use Spatie\LaravelData\Data;

/**
 * @typescript
 */
class KeyValueDto extends Data
{
    public function __construct(
        public string $key,
        public string $value
    ){}
}
