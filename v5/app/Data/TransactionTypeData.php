<?php

namespace App\Data;

use Spatie\LaravelData\Data;

/**
 * @typescript
 */
class TransactionTypeData extends Data
{
    public function __construct(
        public string $name,
        public string $slug_text,
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

            'slug_text' => [
                'required',
                'string',
                'max:255',
            ],
        ];
    }
}
