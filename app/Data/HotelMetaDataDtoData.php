<?php

namespace App\Data;

use App\Models\HotelMetaData;
use App\Models\Neighborhood;
use App\Models\PropertyCondition;
use App\Models\PropertyType;
use App\Models\Status;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Data;

/**
 * @typescript
 */
class HotelMetaDataDtoData extends Data
{
    public function __construct(
        public ?string $title,
        public ?string $address,
        public ?string $description,
        public int $property_type_id,
        public int $property_condition_id,
        public int $status_id,
        public int $neighborhood_id,
        public ?string $slug = null,
        public ?int $id = null,
        public ?string $property_type_name = null,
        public ?string $property_condition_name = null,
        public ?string $status_name = null,
        public ?string $neighborhood_name = null,
    ) {
    }

    public static function fromModel(
        HotelMetaData $hotelMetaData,
    ): self {
        return new self(
            title: $hotelMetaData->title,
            address: $hotelMetaData->address,
            description: $hotelMetaData->description,
            property_type_id: $hotelMetaData->property_type_id,
            property_condition_id: $hotelMetaData->property_condition_id,
            status_id: $hotelMetaData->status_id,
            neighborhood_id: $hotelMetaData->neighborhood_id,
            slug: $hotelMetaData->slug,
            id: $hotelMetaData->id,
            property_type_name: $hotelMetaData->propertyType?->name,
            property_condition_name: $hotelMetaData->condition?->name,
            status_name: $hotelMetaData->status?->name,
            neighborhood_name: $hotelMetaData->neighborhood?->name,
        );
    }

    public static function rules(): array
    {
        return [
            'id' => [
                'nullable',
                'integer',
            ],

            'title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'address' => [
                'nullable',
                'string',
                'max:255',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'property_type_id' => [
                'required',
                'integer',
                Rule::exists(PropertyType::class, 'id'),
            ],

            'property_condition_id' => [
                'required',
                'integer',
                Rule::exists(PropertyCondition::class, 'id'),
            ],

            'status_id' => [
                'required',
                'integer',
                Rule::exists(Status::class, 'id'),
            ],

            'neighborhood_id' => [
                'required',
                'integer',
                Rule::exists(Neighborhood::class, 'id'),
            ],

            'slug' => [
                'nullable',
                'string',
                'max:255',
            ],

            'property_type_name' => [
                'nullable',
                'string',
                'max:255',
            ],

            'property_condition_name' => [
                'nullable',
                'string',
                'max:255',
            ],

            'status_name' => [
                'nullable',
                'string',
                'max:255',
            ],

            'neighborhood_name' => [
                'nullable',
                'string',
                'max:255',
            ],
        ];
    }
}
