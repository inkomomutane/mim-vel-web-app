<?php

namespace App\Data;

use Spatie\LaravelData\Data;

/**
 * @typescript
 */
class BusinessRuleData extends Data
{
    public function __construct(
        public string $name,
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
}
