<?php

namespace App\Data;

use App\Models\City;
use App\Models\Neighborhood;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Data;

/**
 * @typescript
 */
class NeighborhoodData extends Data
{
    public function __construct(
        public ?string $name,
        public int $city_id,
        public ?string $city_name = null,
        public ?string $province_name = null,
        public ?int $id = null,
        public ?string $slug = null,
    ) {
    }

    public static function rules(): array
    {
        return [
            'id' => [
                'nullable',
                'integer',
            ],

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'city_id' => [
                'required',
                'integer',
                Rule::exists(
                    City::class,
                    'id',
                ),
            ],

            'city_name' => [
                'nullable',
                'string',
                'max:255',
            ],

            'province_name' => [
                'nullable',
                'string',
                'max:255',
            ],
        ];
    }

    public static function fromModel(
        Neighborhood $neighborhood,
    ): self {
        return new self(
            name: $neighborhood->name,
            city_id: $neighborhood->city_id,

            city_name: $neighborhood
                ->city
                ?->name,

            province_name: $neighborhood
                ->city
                ?->province
                ?->name,

            id: $neighborhood->id,
            slug: $neighborhood->slug
        );
    }
}
