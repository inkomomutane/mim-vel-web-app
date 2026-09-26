<?php

namespace App\Data;

use Spatie\LaravelData\Data;

/**
 * @typescript
 */
class IntermediationRuleData extends Data
{
    public function __construct(
        public string $name,
        public string $code,
        public float $percentage,
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

            'code' => [
                'required',
                'string',
                'max:255',
            ],

            'percentage' => [
                'required',
                'numeric',
                'min:0',
                'max:100',
            ],
        ];
    }
}
