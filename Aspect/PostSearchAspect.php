<?php

namespace App\Aspect;

use App\Models\Property;
use Illuminate\Database\Eloquent\Collection;
use Spatie\Searchable\SearchAspect;

class PostSearchAspect extends SearchAspect
{
    public function getResults(string $term): Collection
    {
        return Property::with([
            'bairro',
            'bairro.cidade',
            'condicao',
            'status',
            'corretor',
            'tipo_de_imovel',
        ])
            ->orWhere('titulo', 'like', '%'.$term.'%')
            ->orWhere('descricao', 'like', '%'.$term.'%')
            ->orWhereHas('bairro', function ($q) use ($term) {
                $q->where('nome', 'like', '%'.$term.'%');
            })
            ->orWhereHas('bairro.cidade', function ($q) use ($term) {
                $q->where('nome', 'like', '%'.$term.'%');
            })
            ->orWhereHas('condicao', function ($q) use ($term) {
                $q->where('nome', 'like', '%'.$term.'%');
            })
            ->orWhereHas('status', function ($q) use ($term) {
                $q->where('nome', 'like', '%'.$term.'%');
            })
            ->orWhereHas('tipo_de_imovel', function ($q) use ($term) {
                $q->where('nome', 'like', '%'.$term.'%');
            })
            ->get();
    }
}
