<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Pricecurrent\LaravelEloquentFilters\AbstractEloquentFilter;

class ImovelFloorFilter extends AbstractEloquentFilter
{
    protected int $floors;

    public function __construct(int $floors)
    {
        $this->floors = $floors;
    }

    public function apply(Builder $query): Builder
    {
        return $query->where('andares', '<=', $this->floors);
    }
}
