<?php

namespace App\Actions\Hotel;

use App\Data\CondicaoData;
use App\Data\ImovelTypeData;
use App\Data\MultilevelProvinceData;
use App\Data\StatusData;
use App\Models\Condicao;
use App\Models\HotelMetaData;
use App\Models\Province;
use App\Models\Status;
use App\Models\TipoDeImovel;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsAction;

class EditHotel
{
    use AsAction; //

    public function asController(HotelMetaData $hotel): \Inertia\Response
    {
        $hotel->loadMissing(['hotels.media', 'bairro.cidade.province', 'status', 'tipoDeImovel', 'condicao', 'media']);

        return Inertia::render('Hotel/EditHotel', [
            'hotel' => $hotel->getData(),
            'provinces' => MultilevelProvinceData::collection(Province::with('cidades.bairros')->get()),
            'imovelsTypes' => ImovelTypeData::collection(TipoDeImovel::all()),
            'imovelConditions' => CondicaoData::collection(Condicao::all()),
            'statuses' => StatusData::collection(Status::all()),
        ]);
    }
}
