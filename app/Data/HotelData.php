<?php

namespace App\Data;

use App\Models\Hotel;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;


/** @typescript */
class HotelData extends Data
{
    public function __construct(
        public  readonly ?int $id,
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
            price: $hotel->preco,
            hotelMetaData: Lazy::whenLoaded(
                'hotelMetaData',
                $hotel,
                fn () => $hotel->hotelMetaData->getData()
            ),
            media: Lazy::whenLoaded(
                'media',
                $hotel,
                fn () => !is_null($hotel->getFirstMedia('hotels')) ?
                    MediaData::fromModel($hotel->getFirstMedia('hotels')) :
                    null
            ),
        );
    }
}
