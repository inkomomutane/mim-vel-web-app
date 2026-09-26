<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class WebsitePropertyFilters extends Data
{
    public function __construct(
        public ?float $minPrice = null,
        public ?float $maxPrice = null,

        public array $propertyTypes = [],
        public array $conditions = [],
        public array $propertyFor = [],
        public array $neighbourhoods = [],

        public ?int $minBedrooms = null,
        public ?int $maxBedrooms = null,

        public ?int $minBathrooms = null,
        public ?int $maxBathrooms = null,

        public ?int $minSuites = null,
        public ?int $maxSuites = null,

        public ?int $minGarages = null,
        public ?int $maxGarages = null,

        public ?int $minPools = null,
        public ?int $maxPools = null,

        public ?int $minFloors = null,
        public ?int $maxFloors = null,

        public ?float $minArea = null,
        public ?float $maxArea = null,

        public ?int $minYear = null,
        public ?int $maxYear = null,
    ) {}
}
