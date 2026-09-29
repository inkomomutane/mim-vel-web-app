<?php

namespace App\Data;

use App\Models\Term;
use Spatie\LaravelData\Data;

/**
 * @typescript
 */
class TermAndConditionData extends Data
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
        Term $term,
    ): self {
        return new self(
            content: $term->content,
            id: $term->id,
        );
    }
}
