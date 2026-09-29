<?php

namespace App\Data;

use App\Models\Property;
use App\Models\Rating;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Data;

/**
 * @typescript
 */
class RatingData extends Data
{
    public function __construct(
        public ?float $rating,
        public ?string $ip,
        public ?string $name,
        public int $property_id,
        public ?int $id = null,
    ) {
    }

    public static function rules(): array
    {
        return [
            'id' => [
                'nullable',
                'integer',
            ],

            'rating' => [
                'nullable',
                'numeric',
            ],

            'ip' => [
                'nullable',
                'ip',
                'max:45',
            ],

            'name' => [
                'nullable',
                'string',
                'max:255',
            ],

            'property_id' => [
                'required',
                'integer',
                Rule::exists(
                    Property::class,
                    'id',
                ),
            ],
        ];
    }

    public static function fromModel(
        Rating $rating,
    ): self {
        return new self(
            rating: $rating->rating,
            ip: $rating->ip,
            name: $rating->name,
            property_id: $rating->property_id,
            id: $rating->id,
        );
    }
}
