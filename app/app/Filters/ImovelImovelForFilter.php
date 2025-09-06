<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Pricecurrent\LaravelEloquentFilters\AbstractEloquentFilter;

class ImovelImovelForFilter extends AbstractEloquentFilter
{
    /** @var array<int> imovelsFor */
    protected array $imovelsFor;

    public function __construct(array $imovelsFor = [])
    {
        $this->imovelsFor = $imovelsFor;
    }

    public function apply(Builder $query): Builder
    {
        return $query->whereIn('imovel_for_id', $this->imovelsFor);
    }
}
