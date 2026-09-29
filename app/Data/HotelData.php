<?php

namespace App\Data;

use App\Models\Hotel;
use App\Models\HotelMetaData;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Data;

/**
 * @typescript
 */
class HotelData extends Data
{
    public function __construct(
        public ?int $id,
        public ?float $price,
        public ?string $title,
        public ?string $description,
        public ?string $contact,
        public ?string $email,
        public ?string $slug,
        public int $hotel_meta_data_id,
    ) {
    }

    public static function fromModel(
        Hotel $hotel,
    ): self {
        return new self(
            id: $hotel->id,
            price: $hotel->price,
            title: $hotel->title,
            description: $hotel->description,
            contact: $hotel->contact,
            email: $hotel->email,
            slug: $hotel->slug,
            hotel_meta_data_id: $hotel->hotel_meta_data_id,
        );
    }

    public static function rules(): array
    {
        return [
            'id' => [
                'nullable',
                'integer',
            ],

            'price' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'contact' => [
                'nullable',
                'string',
                'max:255',
            ],

            'email' => [
                'nullable',
                'email',
                'max:255',
            ],

            'slug' => [
                'nullable',
                'string',
                'max:255',
            ],

            'hotel_meta_data_id' => [
                'required',
                'integer',
                Rule::exists(HotelMetaData::class, 'id'),
            ],
        ];
    }
}
