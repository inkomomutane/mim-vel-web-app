<?php

namespace App\Support\Traits;

use App\Models\HotelMetaData;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\HigherOrderWhenProxy;

trait GetHotelWithSearchScope
{
    /**
     * @return array|HotelMetaData[]|Builder[]|Collection|\Illuminate\Database\Query\Builder[]|\Illuminate\Support\Collection|HigherOrderWhenProxy[]
     *
     **/
    private function getHotels(?string $term = null): array|Collection|\Illuminate\Support\Collection
    {

        $query = HotelMetaData::query()
            ->
            when($term, function (Builder $query, $term) {
                $query->where('title', 'like', "%{$term}%")
                    ->orWhere('address', 'like', "%{$term}%")
                    ->orWhere('description', 'like', "%{$term}%")
                    ->orWhereRelation('bairro', 'nome',
                        'like', "%{$term}%");
            })->with([
                'tipoDeImovel',
                'condicao',
                'status',
                'bairro',
                 'attributes'
            ]);

        return $query->orderBy('updated_at', 'desc')->get();
    }
}
