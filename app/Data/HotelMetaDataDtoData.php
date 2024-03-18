<?php

namespace App\Data;

use App\Models\HotelMetaData;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Lazy;

/** @typescript */
class HotelMetaDataDtoData extends Data
{
    public function __construct(
        public readonly ?int $id,
        public readonly ?string $title,
        public readonly ?string $address,
        public readonly ?string $description,
        public readonly ?string $slug,
        public readonly Lazy|ImovelTypeData $imovelTypeData,
        public readonly Lazy|CondicaoData|null $condicaoData,
        public readonly Lazy|StatusData|null $statusData,
        public readonly Lazy|BairroData|null $bairroData,
        /** @var HotelData[] $hotels */
        public readonly Lazy|null|DataCollection $hotels,
        /** @var MediaData[] * */
        public Lazy|null|DataCollection $media,
        /** @var AttributeData[] $attributes */
        public readonly DataCollection|Lazy|null $attributes,

    ) {
    }

    public static function fromModel(HotelMetaData $hotelMetaData): self
    {
        return new self(
            id: $hotelMetaData->id,
            title: $hotelMetaData->title,
            address: $hotelMetaData->address,
            description: $hotelMetaData->description,
            slug: $hotelMetaData->slug,
            imovelTypeData: Lazy::whenLoaded(
                'tipoDeImovel',
                $hotelMetaData,
                static   fn () => $hotelMetaData->tipoDeImovel->getData()
            ),
            condicaoData: Lazy::whenLoaded(
                'condicao',
                $hotelMetaData,
                static   fn () => $hotelMetaData->condicao->getData()
            ),
            statusData: Lazy::whenLoaded(
                'status',
                $hotelMetaData,
                static   fn () => $hotelMetaData->status->getData()
            ),
            bairroData: Lazy::whenLoaded(
                'bairro',
                $hotelMetaData,
                static fn () => $hotelMetaData->bairro->getData()
            ),
            hotels: Lazy::whenLoaded(
                'hotels',
                $hotelMetaData,
                static fn () => $hotelMetaData->hotels->map(function ($hotel) {
                    $hotel->loadMissing('media');

                    return $hotel->getData();
                })
            ),
            media: Lazy::whenLoaded(
                'media',
                $hotelMetaData,
                static fn () => $hotelMetaData->getMedia('main_hotels')->map(fn ($media) => MediaData::fromModel($media))
            ),
            attributes: Lazy::whenLoaded(
                'attributes',
                $hotelMetaData,
                static fn () => AttributeData::collection($hotelMetaData->attributes)
            ),
        );
    }
}
