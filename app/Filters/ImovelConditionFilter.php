<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Pricecurrent\LaravelEloquentFilters\AbstractEloquentFilter;

class ImovelConditionFilter extends AbstractEloquentFilter
{
    /** @var array<int> conditions */
    protected array $conditions;

    public function __construct(array $conditions = [])
    {
        $this->conditions = $conditions;
    }

    public function apply(Builder $query): Builder
    {
        return $query->whereIn('condicao_id', $this->conditions);
    }
}
