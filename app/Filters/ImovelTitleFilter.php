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
        return $query->where('titulo', 'like', "%{$this->title}%")
            ->orWhere('descricao','like', "%{$this->title}%")
            ->orWhere('endereco','like', "%{$this->title}%")
            ->orWhereRelation('bairro', 'nome', 'like', "%{$this->title}%")
            ->orWhereRelation('bairro.cidade', 'nome', 'like', "%{$this->title}%")
            ->orWhereRelation('bairro.cidade.province', 'name', 'like',"%{$this->title}%");
    }
}
