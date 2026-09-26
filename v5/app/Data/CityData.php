<?php

namespace App\Data;

use App\Models\Province;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Data;

/**
 * @typescript
 */
class CityData extends Data
{
    public function __construct(
        public string $nome,
        public int $province_id,
        public ?string $province_name = null,
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

            'nome' => [
                'required',
                'string',
                'max:255',
            ],

            'province_id' => [
                'required',
                'integer',
                Rule::exists(Province::class, 'id'),
            ],

            'province_name' => [
                'nullable',
                'string',
                'max:255',
            ],
        ];
    }
}
