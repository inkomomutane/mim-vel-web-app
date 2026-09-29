<?php

namespace App\Data;

use App\Models\PartnerTag;
use Spatie\LaravelData\Data;

/**
 * @typescript
 */
class PartnerTagData extends Data
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
        PartnerTag $partnerTag,
    ): self {
        return new self(
            name: $partnerTag->name,
            id: $partnerTag->id,
        );
    }
}
