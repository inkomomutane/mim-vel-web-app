<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Pricecurrent\LaravelEloquentFilters\AbstractEloquentFilter;

class ImovelAreaFilter extends AbstractEloquentFilter
{
    protected float $min;

    protected float $max;

    public function __construct(float $min, float $max)
    {
        $this->min = $min;
        $this->max = $max;
    }

    public function apply(Builder $query): Builder
    {
        return $query->where('area', '>=', $this->min)
            ->where('area', '<=', $this->max);
    }
}
