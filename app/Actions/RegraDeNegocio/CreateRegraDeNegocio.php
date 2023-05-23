<?php

namespace App\Actions\RegraDeNegocio;

use App\Data\RegraDeNegocioData;
use App\Models\RegraDeNegocio;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class CreateRegraDeNegocio
{
    use AsAction;
    use AsController;

    public function handle(RegraDeNegocioData $regraDeNegocioData)
    {
        return RegraDeNegocio::create($regraDeNegocioData->all());
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:regra_de_negocios,name',
        ];
    }

     public function AsController(ActionRequest $request)
     {
         $this->handle(RegraDeNegocioData::from($request->validated()));
         flash()->addSuccess('Regra de negóciação criada com sucesso.');

         return \redirect()->back();
     }
}
