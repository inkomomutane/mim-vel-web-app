<?php

namespace App\Support\Traits;

use App\Models\Hotel;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait GetHotelWithSearchScope
{
    /**
     * @return Collection<Hotel>
     *
     **/
    private function getHotels(string $term = null, bool $approved = true)
    {

        $query = Hotel::query()->when($term, function ($query, $search) {
            $query->WhereRelation('hotelMetaData', 'title', 'like', '%' . $search . '%')
                ->orWhereRelation('hotelMetaData', 'address', 'like', '%' . $search . '%')
                ->orWhereRelation('hotelMetaData.bairro', 'nome', 'like', '%' . $search . '%')
                ->orWhereRelation('hotelMetaData.bairro.cidade', 'nome', 'like', '%' . $search . '%')
                ->orWhereRelation('hotelMetaData.bairro.cidade.province', 'name', 'like', '%' . $search . '%');
            $query
                ->with(
                    [
                        'hotelMetaData.tipoDeImovel',
                        'hotelMetaData.bairro.cidade.province',
                        'media' => function (MorphMany $query) {
                            $query->where('collection_name', 'hotels')->first();
                        },
                    ]
                );
        })->with(
            [
                'hotelMetaData.tipoDeImovel',
                'hotelMetaData.bairro.cidade.province',
                'media' => function (MorphMany $query) {
                    $query->where('collection_name', 'hotels')->first();
                },
            ]
        );

        return $query->orderBy('updated_at', 'desc')->get();
    }
}
