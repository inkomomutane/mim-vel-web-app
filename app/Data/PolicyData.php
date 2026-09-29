<?php

namespace App\Data;

use App\Models\Policy;
use Spatie\LaravelData\Data;

/**
 * @typescript
 */
class PolicyData extends Data
{
    public function __construct(
        public ?string $content,
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

            'content' => [
                'nullable',
                'string',
            ],
        ];
    }

    public static function fromModel(
        Policy $policy,
    ): self {
        return new self(
            content: $policy->content,
            id: $policy->id,
        );
    }
}
