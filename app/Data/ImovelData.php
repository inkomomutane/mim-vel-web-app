<?php

namespace App\Data;

use App\Models\Imovel;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;

/** @typescript */
class ImovelData extends Data
{
    public function __construct(
        public Lazy|null|int $id,
        public Lazy|null|string $titulo,
        public Lazy|null|string $descricao,
        public Lazy|null|int $banheiros,
        public Lazy|null|int|string $preco,
        public Lazy|null|int $ano,
        public Lazy|null|int $andares,
        public Lazy|null|float $area,
        public Lazy|null|int $quartos,
        public Lazy|null|int $suites,
        public Lazy|null|int $garagens,
        public Lazy|null|int $piscinas,
        public Lazy|null|string $endereco,
        public Lazy|null|string $mapa,
        public Lazy|null|int $views,
         /** @var CondicaoData * */
        public Lazy|null|CondicaoData $condicao,
        public Lazy|null|BairroData $bairro,
        public Lazy|null|ImovelTypeData $tipo_de_imovel,
        public Lazy|null|StatusData $status,
        public Lazy|null|UserData $corretor,
        public Lazy|null|string $slug,
        public Lazy|null|bool $for_rent,
        public Lazy|null|RegraDeNegocioData $regra_de_negocio,
        public Lazy|null|TransactionTypeData $imovel_for,
        public Lazy|null|IntermediationRuleData $intermediation_rule,
        /** @var MediaData * */
        public Lazy|null|MediaData $media,
    ) {
    }

    public static function fromModel(Imovel $imovel)
    {
        return new self(
            id: $imovel->id,
            titulo: $imovel->titulo,
            descricao: $imovel->descricao,
            banheiros: $imovel->banheiros,
            preco: $imovel->preco,
            ano: $imovel->ano,
            andares: $imovel->andares,
            area: $imovel->area,
            quartos: $imovel->quartos,
            suites: $imovel->suites,
            garagens: $imovel->garagens,
            piscinas: $imovel->piscinas,
            endereco: $imovel->endereco,
            mapa: $imovel->mapa,
            views: $imovel->views,
            condicao: Lazy::whenLoaded('condicao',$imovel,fn() => $imovel->condicao->getData()),
            bairro: Lazy::whenLoaded('bairro',$imovel,fn() => $imovel->bairro->getData()),
            tipo_de_imovel: Lazy::whenLoaded('tipo_de_imovel',$imovel,fn () => $imovel->tipo_de_imovel->getData()),
            status: Lazy::whenLoaded('status',$imovel,fn () => $imovel->status->getData()),
            corretor: Lazy::whenLoaded('corretor',$imovel,fn () => $imovel->corretor->getData()),
            slug: $imovel->slug,
            for_rent: $imovel->for_rent,
            regra_de_negocio:Lazy::whenLoaded('regraDeNegocio',$imovel,fn () => $imovel->regraDeNegocio->getData()),
            imovel_for: Lazy::whenLoaded('imovelFor',$imovel,fn () => $imovel->imovelFor->getData()),
            intermediation_rule:Lazy::whenLoaded('intermediationRule',$imovel,fn () => $imovel->intermediationRule->getData()),
            media:Lazy::whenLoaded('media',$imovel,fn () =>  ! is_null($imovel->getFirstMedia('posts')) ?
            MediaData::fromModel($imovel->getFirstMedia('posts')) :
            null),

        );
    }
}
