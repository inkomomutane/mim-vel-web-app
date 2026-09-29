<?php

namespace App\Data;

use App\Models\PropertyType;
use Spatie\LaravelData\Data;

/**
 * @typescript
 */
class PropertyTypeData extends Data
{
    public function __construct(
        public ?string $name,
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
        ];
    }

    public static function fromModel(
        PropertyType $propertyType,
    ): self {
        return new self(
            name: $propertyType->name,
            id: $propertyType->id,
        );
    }
}
