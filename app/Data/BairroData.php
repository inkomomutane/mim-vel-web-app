<?php

namespace App\Data;

use App\Models\Neighborhood;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;

/** @typescript */
class BairroData extends Data
{
    public function __construct(
        public ?int $id,
        public string $nome,
        public Lazy|null|CityData $city
    ) {
    }

    public static function fromModel(Neighborhood $bairro)
    {

        return new self(
            id: $bairro->id,
            nome: $bairro->nome,
            city: Lazy::whenLoaded('cidade', $bairro, fn () => $bairro->cidade->getData())
        );
    }
}
