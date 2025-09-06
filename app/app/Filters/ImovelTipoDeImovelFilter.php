<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Pricecurrent\LaravelEloquentFilters\AbstractEloquentFilter;

class ImovelTipoDeImovelFilter extends AbstractEloquentFilter
{
    /** @var array<int> tiposDeImovel */
    protected array $tiposDeImovel;

    public function __construct(array $tiposDeImovel = [])
    {
        $this->tiposDeImovel = $tiposDeImovel;
    }

    public function apply(Builder $query): Builder
    {
        return $query->whereIn('tipo_de_imovel_id', $this->tiposDeImovel);
    }
}
