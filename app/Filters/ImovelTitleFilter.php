<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Pricecurrent\LaravelEloquentFilters\AbstractEloquentFilter;

class ImovelTitleFilter extends AbstractEloquentFilter
{
    protected String $title;

    public function __construct(string $title)
    {
        $this->title = $title;
    }

    public function apply(Builder $query): Builder
    {
        return $query->where('titulo', 'like', "%{$this->title}%");
    }
}
