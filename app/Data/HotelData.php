<?php

namespace App\Data;

use App\Models\Hotel;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;

/** @typescript */
class HotelData extends Data
{
    public function __construct(
        public readonly ?int $id,
        public readonly ?string $slug,
        public readonly ?string $title,
        public readonly ?string $contact,
        public readonly ?string $email,
        public readonly ?string $description,
        public readonly ?string $price,
        public readonly Lazy|HotelMetaDataDtoData|null $hotelMetaData,
        /** @var MediaData * */
        public Lazy|null|MediaData $media,
    ) {
    }

    public static function fromModel(Hotel $hotel): self
    {

        return new self(
            id: $hotel->id,
            slug: $hotel->slug,
            title: $hotel->title,
            contact: $hotel->contact, email: $hotel->email,
            description: $hotel->description,
            price: $hotel->preco,
            hotelMetaData: Lazy::whenLoaded(
                'hotelMetaData',
                $hotel,
                fn () => $hotel->hotelMetaData->getData()
            ),
            media: Lazy::whenLoaded(
                'media',
                $hotel,
                fn () => ! is_null($hotel->getFirstMedia('hotels')) ?
                    MediaData::fromModel($hotel->getFirstMedia('hotels')) :
                    null
            ),
        );
    }
}
