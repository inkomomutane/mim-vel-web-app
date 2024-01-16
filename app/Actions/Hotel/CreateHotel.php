<?php

namespace App\Actions\Hotel;

use App\Data\CondicaoData;
use App\Data\ImovelTypeData;
use App\Data\MultilevelProvinceData;
use App\Data\StatusData;
use App\Models\Condicao;
use App\Models\Province;
use App\Models\Status;
use App\Models\TipoDeImovel;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsController;

class CreateHotel
{
    use AsController;

    public function AsController(): \Inertia\Response
    {
        return Inertia::render('Hotel/CreateHotel', [
            'provinces' => MultilevelProvinceData::collection(Province::with('cidades.bairros')->get()),
            'imovelsTypes' => ImovelTypeData::collection(TipoDeImovel::all()),
            'imovelConditions' => CondicaoData::collection(Condicao::all()),
            'statuses' => StatusData::collection(Status::all()),
        ]);
    }
}
