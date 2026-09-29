<?php

namespace App\Data;

use App\Models\Status;
use Spatie\LaravelData\Data;

/**
 * @typescript
 */
class StatusData extends Data
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
        Status $status,
    ): self {
        return new self(
            name: $status->name,
            id: $status->id,
        );
    }
}
