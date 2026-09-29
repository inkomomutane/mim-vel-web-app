<?php

namespace App\Data;

use App\Models\PropertyFor;
use Spatie\LaravelData\Data;

/**
 * @typescript
 */
class PropertyForData extends Data
{
    public function __construct(
        public string $name,
        public ?string $slug = null,
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

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'slug' => [
                'nullable',
                'string',
                'max:255',
            ],
        ];
    }

    public static function fromModel(
        PropertyFor $propertyFor,
    ): self {
        return new self(
            name: $propertyFor->name,
            slug: $propertyFor->slug,
            id: $propertyFor->id,
        );
    }
}
