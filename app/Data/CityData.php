<?php

namespace App\Data;

use App\Models\City;
use App\Models\Province;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Data;

/**
 * @typescript
 */
class CityData extends Data
{
    public function __construct(
        public string $name,
        public ?int $province_id,
        public ?string $province_name = null,
        public ?int $id = null,
        public ?string $slug = null,
    ) {
    }

    public static function fromModel(
        City $city,
    ): self {
        return new self(
            name: $city->name,
            province_id: $city->province_id,
            province_name: $city->province?->name,
            id: $city->id,
            slug: $city->slug,
        );
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

            'province_id' => [
                'nullable',
                'integer',
                Rule::exists(Province::class, 'id'),
            ],

            'province_name' => [
                'nullable',
                'string',
                'max:255',
            ],
        ];
    }
}
