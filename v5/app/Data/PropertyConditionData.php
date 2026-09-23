<?php

namespace App\Data;

use Spatie\LaravelData\Data;

/** @typescript */
class PropertyConditionData extends Data
{
    public function __construct(
        public ?int $id,
        public ?string $nome,
    ) {
    }

    public static function rules(): array
    {
        return [
            'id' => ['nullable', 'integer'],
            'nome' => ['required', 'string', 'max:255'],
        ];
    }
}
