<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Pricecurrent\LaravelEloquentFilters\AbstractEloquentFilter;

class ImovelBairroFilter extends AbstractEloquentFilter
{
    /** @var array<int> bairros */
    protected array $bairros;

    public function __construct(array $bairros = [])
    {
        $this->bairros = $bairros;
    }

    public function apply(Builder $query): Builder
    {
        return $query->whereIn('bairro_id', $this->bairros);
    }
}
