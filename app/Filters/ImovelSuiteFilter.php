<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Pricecurrent\LaravelEloquentFilters\AbstractEloquentFilter;

class ImovelSuiteFilter extends AbstractEloquentFilter
{
    protected int $suites;

    public function __construct(int $suites)
    {
        $this->suites = $suites;
    }

    public function apply(Builder $query): Builder
    {
        return $query->where('suites', '<=', $this->suites);
    }
}
