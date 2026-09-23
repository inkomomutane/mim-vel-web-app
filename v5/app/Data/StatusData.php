<?php

namespace App\Data;

use Spatie\LaravelData\Data;

/** @typescript */
class StatusData extends Data
{
    public function __construct(
        public readonly ?int $id,
        public readonly ?string $nome,
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
