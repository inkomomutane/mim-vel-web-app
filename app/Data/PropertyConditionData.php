<?php

namespace App\Data;

use App\Models\PropertyCondition;
use Spatie\LaravelData\Data;

/**
 * @typescript
 */
class PropertyConditionData extends Data
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
        PropertyCondition $propertyCondition,
    ): self {
        return new self(
            name: $propertyCondition->name,
            id: $propertyCondition->id,
        );
    }
}
