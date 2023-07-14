<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Pricecurrent\LaravelEloquentFilters\AbstractEloquentFilter;

class ImovelDescriptionFilter extends AbstractEloquentFilter
{
    protected String $description;

    public function __construct(string $description)
    {
        $this->description = $description;
    }

    public function apply(Builder $query): Builder
    {
        return $query->orWhere('descricao', 'like', "%{$this->description}%");
    }
}
