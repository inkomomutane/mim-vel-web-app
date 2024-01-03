<?php

namespace App\Actions\Hotel;

use Inertia\Inertia;
use App\Data\StatusData;
use App\Models\Condicao;
use App\Models\Province;
use App\Data\CondicaoData;
use App\Data\ImovelTypeData;
use App\Models\TipoDeImovel;
use App\Models\HotelMetaData;
use App\Data\HotelMetaDataDtoData;
use App\Data\MultilevelProvinceData;
use App\Models\Status;
use Lorisleiva\Actions\Concerns\AsAction;

class EditHotel
{

    use AsAction; #

    public function asController(HotelMetaData $hotel)
    {
        $hotel->loadMissing('hotels.media');
        return Inertia::render('Hotel/EditHotel', [
            'hotel' => $hotel->getData(),
            'provinces' => MultilevelProvinceData::collection(Province::with('cidades.bairros')->get()),
            'imovelsTypes' => ImovelTypeData::collection(TipoDeImovel::all()),
            'imovelConditions' => CondicaoData::collection(Condicao::all()),
            'statuses' => StatusData::collection(Status::all()),
        ]);
    }
}
