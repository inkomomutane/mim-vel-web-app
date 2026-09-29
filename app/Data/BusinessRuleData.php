<?php

namespace App\Data;

use App\Models\BusinessRule;
use Spatie\LaravelData\Data;

/**
 * @typescript
 */
class BusinessRuleData extends Data
{
    public function __construct(
        public ?int $id,
        public string $name,
    ) {
    }

    public static function fromModel(
        BusinessRule $businessRule,
    ): self {
        return new self(
            id: $businessRule->id,
            name: $businessRule->name,
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
        ];
    }
}
