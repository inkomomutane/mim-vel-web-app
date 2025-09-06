<?php

namespace App\Actions\Hotel;

use App\Data\AttributeData;
use App\Data\CondicaoData;
use App\Data\ImovelTypeData;
use App\Data\MultilevelProvinceData;
use App\Data\StatusData;
use App\Models\Attribute;
use App\Models\Condicao;
use App\Models\HotelMetaData;
use App\Models\Province;
use App\Models\Status;
use App\Models\TipoDeImovel;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\LaravelData\Exceptions\InvalidDataClass;

class EditHotel
{
    use AsAction; //

    /**
     * @throws InvalidDataClass
     */
    public function asController(HotelMetaData $hotel): \Inertia\Response
    {
        $hotel->loadMissing(['hotels.media', 'bairro.cidade.province', 'status', 'tipoDeImovel', 'condicao', 'media','attributes']);

        return Inertia::render('Hotel/EditHotel', [
            'hotel' => $hotel->getData(),
            'provinces' => MultilevelProvinceData::collection(Province::with('cidades.bairros')->get()),
            'imovelsTypes' => ImovelTypeData::collection(TipoDeImovel::all()),
            'imovelConditions' => CondicaoData::collection(Condicao::all()),
            'statuses' => StatusData::collection(Status::all()),
            'attributes' => AttributeData::collection(Attribute::with('media')->get()),
        ]);
    }
}
