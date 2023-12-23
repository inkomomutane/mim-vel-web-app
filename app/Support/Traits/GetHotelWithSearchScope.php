<?php

namespace App\Support\Traits;

use App\Models\Hotel;
use App\Models\HotelMetaData;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait GetHotelWithSearchScope
{
    /**
     * @return Collection<Hotel>
     *
     **/
    private function getHotels(string $term = null, bool $approved = true)
    {

        $query = HotelMetaData::query()->with([
            'tipoDeImovel',
            'condicao',
            'status',
            'bairro',
        ]);
        return $query->orderBy('updated_at', 'desc')->get();
    }
}
