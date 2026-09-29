<?php

namespace App\Data;

use Spatie\LaravelData\Data;

/**
 * @typescript
 */
class ProvinceData extends Data
{
    public function __construct(
        public string $name,
        public ?int $id = null,
    ) {
    }

    public static function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'id' => ['nullable', 'integer'],
        ];
    }
}
