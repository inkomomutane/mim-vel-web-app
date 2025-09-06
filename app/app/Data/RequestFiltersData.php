<?php

namespace App\Data;

use Spatie\LaravelData\Data;

/** @typescript **/
class RequestFiltersData extends Data
{
    public function __construct(
        /** @var null|int[] $imovelTypes */
        public ?array $imovelTypes,
        public ?string $title,
        public ?array $bairros
    ) {
    }
}
