<?php

namespace App\Data;

use App\Models\BusinessRule;
use App\Models\IntermediationRule;
use App\Models\Neighborhood;
use App\Models\Property;
use App\Models\PropertyCondition;
use App\Models\PropertyFor;
use App\Models\PropertyType;
use App\Models\Status;
use App\Models\User;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Data;

/**
 * @typescript
 */
class CardPropertyData extends Data
{
    public function __construct(
        public ?string $title,
        public ?float $price,
        public ?string $description,
        public ?string $slug,

        public ?int $bathrooms,
        public ?int $year,
        public ?int $floors,
        public ?float $area,
        public ?int $bedrooms,
        public ?int $suites,
        public ?int $garages,
        public ?int $pools,

        public ?string $address,
        public ?string $map,

        public bool $for_rent,

        public ?string $published_at,
        public ?int $views,

        public int $neighborhood_id,
        public int $property_condition_id,
        public int $property_type_id,
        public int $status_id,
        public int $broker_id,

        public ?int $business_rule_id = null,
        public ?int $property_for_id = null,
        public ?int $intermediation_rule_id = null,

        public ?string $details = null,

        public bool $approved = false,
        public ?int $approved_by_id = null,
        public ?string $approved_at = null,

        public ?string $neighborhood_name = null,
        public ?string $property_condition_name = null,
        public ?string $property_type_name = null,
        public ?string $status_name = null,
        public ?string $broker_name = null,
        public ?string $business_rule_name = null,
        public ?string $property_for_name = null,

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

            'title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'price' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'slug' => [
                'nullable',
                'string',
                'max:255',
            ],

            'bathrooms' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'year' => [
                'nullable',
                'integer',
            ],

            'floors' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'area' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'bedrooms' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'suites' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'garages' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'pools' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'address' => [
                'nullable',
                'string',
            ],

            'map' => [
                'nullable',
                'string',
            ],

            'for_rent' => [
                'boolean',
            ],

            'published_at' => [
                'nullable',
                'date',
            ],

            'views' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'neighborhood_id' => [
                'required',
                'integer',
                Rule::exists(
                    Neighborhood::class,
                    'id',
                ),
            ],

            'property_condition_id' => [
                'required',
                'integer',
                Rule::exists(
                    PropertyCondition::class,
                    'id',
                ),
            ],

            'property_type_id' => [
                'required',
                'integer',
                Rule::exists(
                    PropertyType::class,
                    'id',
                ),
            ],

            'status_id' => [
                'required',
                'integer',
                Rule::exists(
                    Status::class,
                    'id',
                ),
            ],

            'broker_id' => [
                'required',
                'integer',
                Rule::exists(
                    User::class,
                    'id',
                ),
            ],

            'business_rule_id' => [
                'nullable',
                'integer',
                Rule::exists(
                    BusinessRule::class,
                    'id',
                ),
            ],

            'property_for_id' => [
                'nullable',
                'integer',
                Rule::exists(
                    PropertyFor::class,
                    'id',
                ),
            ],

            'intermediation_rule_id' => [
                'nullable',
                'integer',
                Rule::exists(
                    IntermediationRule::class,
                    'id',
                ),
            ],

            'details' => [
                'nullable',
                'string',
            ],

            'approved' => [
                'boolean',
            ],

            'approved_by_id' => [
                'nullable',
                'integer',
                Rule::exists(
                    User::class,
                    'id',
                ),
            ],

            'approved_at' => [
                'nullable',
                'date',
            ],

            'neighborhood_name' => [
                'nullable',
                'string',
                'max:255',
            ],

            'property_condition_name' => [
                'nullable',
                'string',
                'max:255',
            ],

            'property_type_name' => [
                'nullable',
                'string',
                'max:255',
            ],

            'status_name' => [
                'nullable',
                'string',
                'max:255',
            ],

            'broker_name' => [
                'nullable',
                'string',
                'max:255',
            ],

            'business_rule_name' => [
                'nullable',
                'string',
                'max:255',
            ],

            'property_for_name' => [
                'nullable',
                'string',
                'max:255',
            ],
        ];
    }

    public static function fromModel(
        Property $property,
    ): self {
        return new self(
            title: $property->title,
            price: $property->price,
            description: $property->description,
            slug: $property->slug,

            bathrooms: $property->bathrooms,
            year: $property->year,
            floors: $property->floors,
            area: $property->area,
            bedrooms: $property->bedrooms,
            suites: $property->suites,
            garages: $property->garages,
            pools: $property->pools,

            address: $property->address,
            map: $property->map,

            for_rent: $property->for_rent,

            published_at: $property
                ->published_at
                ?->toIso8601String(),

            views: $property->views,

            neighborhood_id: $property->neighborhood_id,
            property_condition_id: $property->property_condition_id,
            property_type_id: $property->property_type_id,
            status_id: $property->status_id,
            broker_id: $property->broker_id,

            business_rule_id: $property->business_rule_id,
            property_for_id: $property->property_for_id,
            intermediation_rule_id: $property->intermediation_rule_id,

            details: $property->details,

            approved: $property->approved,
            approved_by_id: $property->approved_by_id,

            approved_at: $property
                ->approved_at
                ?->toIso8601String(),

            neighborhood_name: $property
                ->neighborhood
                ?->name,

            property_condition_name: $property
                ->condition
                ?->name,

            property_type_name: $property
                ->propertyType
                ?->name,

            status_name: $property
                ->status
                ?->name,

            broker_name: $property
                ->broker
                ?->name,

            business_rule_name: $property
                ->businessRule
                ?->name,

            property_for_name: $property
                ->propertyFor
                ?->name,

            id: $property->id,
        );
    }
}
