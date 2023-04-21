<?php

namespace App\Actions\City;

use App\Models\Cidade;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class CreateCity
{
    use AsAction;
    use AsController;

    public function handle(array $city)
    {
        return Cidade::create($city);
    }

    public function rules()
    {
        return [
            'nome' => 'required|unique:cidades,nome',
            'province_id' => 'required|numeric'
        ];
    }

     public function AsController(ActionRequest $request)
     {
        $this->handle($request->validated());
        flash()->addSuccess('Cidade criada com sucesso.');
        return \redirect()->back();
     }
}
