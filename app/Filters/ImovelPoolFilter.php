<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Pricecurrent\LaravelEloquentFilters\AbstractEloquentFilter;

class ImovelPoolFilter extends AbstractEloquentFilter
{
    protected int $pools;

    public function __construct(int $pools)
    {
        $this->pools = $pools;
    }

    public function apply(Builder $query): Builder
    {
        return $query->where('piscinas', '<=', $this->pools);
    }
}
