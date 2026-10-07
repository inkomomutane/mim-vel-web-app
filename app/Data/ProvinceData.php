<?php

namespace App\Data;

use App\Models\Province;
use Spatie\LaravelData\Data;

/**
 * @typescript
 */
class ProvinceData extends Data
{
    public function __construct(
        public string $name,
        public ?int $id = null,
        public ?string $slug = null,
    ) {
    }

    public static function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'id' => ['nullable', 'integer'],
        ];
    }

    public static function fromModel(
        Province $province,
    ): self {
        return new self(
            name: $province->name,
            id: $province->id,
            slug: $province->slug,
        );
    }
}
