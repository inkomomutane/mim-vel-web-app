<?php

namespace App\Data;

use App\Models\Hotel;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
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
        public readonly ?float $preco,
        public readonly Lazy|HotelMetaDataDtoData|null $hotelMetaData,
        /** @var MediaData[] $images */
        public readonly Lazy|DataCollection|null $images,
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
            preco: $hotel->price,
            hotelMetaData: Lazy::whenLoaded(
                'hotelMetaData',
                $hotel,
                static fn () => $hotel->hotelMetaData->getData()
            ),
            images: Lazy::whenLoaded(
                'media',
                $hotel,
                static fn () => ! is_null($hotel->getMedia('hotels')) ?
                    MediaData::collection($hotel->getMedia('hotels')) :
                    null
            ),
            media: Lazy::whenLoaded(
                'media',
                $hotel,
                static fn () => ! is_null($hotel->getFirstMedia('hotels')) ?
                    MediaData::fromModel($hotel->getFirstMedia('hotels')) :
                    null
            ),
        );
    }
}
