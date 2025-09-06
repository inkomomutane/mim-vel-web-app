<?php

namespace App\Data;

use App\Models\TipoDeImovel;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;

/** @typescript */
class ImovelTypeData extends Data
{
    public function __construct(
        public int $id,
        public string $name,
        public Lazy|MediaData $icon,
    ) {
    }

    public static function fromModel(TipoDeImovel $tipoDeImovel)
    {
        return new self(
            id: $tipoDeImovel->id,
            name : $tipoDeImovel->nome,
            icon: Lazy::whenLoaded('media', $tipoDeImovel, fn () => MediaData::fromModel($tipoDeImovel->getFirstMedia('icons')))
        );
    }
}
