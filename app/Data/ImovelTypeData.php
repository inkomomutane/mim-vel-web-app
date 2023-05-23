<?php

namespace App\Data;

use App\Models\TipoDeImovel;
use Spatie\LaravelData\Data;

/** @typescript */
class ImovelTypeData extends Data
{
    public function __construct(
        public int $id,
        public string $name,
        public MediaData $icon,
    ) {
    }

    public static function fromModel(TipoDeImovel $tipoDeImovel)
    {
        return new self(
            id: $tipoDeImovel->id,
            name : $tipoDeImovel->nome,
            icon: MediaData::fromModel($tipoDeImovel->getFirstMedia('icons'))
        );
    }
}
