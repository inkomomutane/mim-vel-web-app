<?php

namespace App\Actions\Imovel;

use App\Data\CondicaoData;
use App\Data\ImovelTypeData;
use App\Data\IntermediationRuleData;
use App\Data\MultilevelProvinceData;
use App\Data\RegraDeNegocioData;
use App\Data\StatusData;
use App\Data\TransactionTypeData;
use App\Models\Condicao;
use App\Models\Imovel;
use App\Models\ImovelFor;
use App\Models\IntermediationRule;
use App\Models\Province;
use App\Models\RegraDeNegocio;
use App\Models\Status;
use App\Models\TipoDeImovel;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsController;

class EditImovel
{
    use AsController;

    public function AsController(Imovel $imovel)
    {

        $imovel = $imovel->load([
            'corretor',
            'regraDeNegocio',
            'intermediationRule',
            'bairro.cidade.province',
            'condicao',
            'tipo_de_imovel',
            'status',
            'imovelFor',
            'media' => function (MorphMany $query) {
                $query->where('collection_name', 'posts');
            }
        ]);

        return Inertia::render('Imovel/EditImovel', [
            'imovel' => $imovel->getData(),
            'regrasDeNegocio' => RegraDeNegocioData::collection(RegraDeNegocio::all()),
            'transactionTypes' => TransactionTypeData::collection(ImovelFor::all()),
            'provinces' => MultilevelProvinceData::collection(Province::with('cidades.bairros')->get()),
            'imovelsTypes' => ImovelTypeData::collection(TipoDeImovel::all()),
            'imovelConditions' => CondicaoData::collection(Condicao::all()),
            'statuses' => StatusData::collection(Status::all()),
            'intermediationRules' => IntermediationRuleData::collection(IntermediationRule::all())
        ]);
    }
}
