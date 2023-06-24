<?php

namespace App\Data;

use App\Models\Cidade;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Lazy;

/** @typescript */
class CityData extends Data
{
    public function __construct(
        public ?int $id,
        public string $nome,
        public Lazy|ProvinceData|null $province,
        /** @var BairroData[] */
        public Lazy|null|DataCollection $bairros
    ) {
    }

    public static function fromModel(Cidade $cidade){
        return new self(
            id:$cidade->id,
            nome:$cidade->nome,
            province: Lazy::whenLoaded('province',$cidade,fn() => $cidade->province->getData()),
            bairros: Lazy::whenLoaded('bairros',$cidade,fn() => BairroData::collection($cidade->bairros))
        );
    }
}
