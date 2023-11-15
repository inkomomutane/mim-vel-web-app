<?php

namespace App\Data;

use App\Models\HotelMetaData;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;

/** @typescript */
class HotelMetaDataDtoData extends Data
{
    public function __construct(
        public readonly ?int $id,
        public readonly ?string $title,
        public readonly ?string $address,
        public readonly ?string $description,
        public readonly Lazy|ImovelTypeData|null $imovelTypeData,
        public readonly Lazy|CondicaoData|null $condicaoData,
        public readonly Lazy|StatusData|null $statusData,
        public readonly Lazy|BairroData|null $bairroData,

    ) {
    }


    public function fromModel(HotelMetaData $hotelMetaData): self
    {
        return new self(
            id: $hotelMetaData->id,
            title: $hotelMetaData->title,
            address: $hotelMetaData->address,
            description: $hotelMetaData->description,
            imovelTypeData: Lazy::whenLoaded(
                'tipoDeImovel',
                $hotelMetaData,
                fn () => $hotelMetaData->tipoDeImovel->getData()
            ),
            condicaoData: Lazy::whenLoaded(
                'condicao',
                $hotelMetaData,
                fn () => $hotelMetaData->condicao->getData()
            ),
            statusData: Lazy::whenLoaded(
                'status',
                $hotelMetaData,
                fn () => $hotelMetaData->status->getData()
            ),
            bairroData: Lazy::whenLoaded(
                'bairro',
                $hotelMetaData,
                fn () => $hotelMetaData->bairro->getData()
            ),
        );
    }
}

