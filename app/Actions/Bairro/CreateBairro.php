<?php

namespace App\Actions\Bairro;

use App\Models\Bairro;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class CreateBairro
{
    use AsAction;
    use AsController;

    public function handle(array $city)
    {
        return Bairro::create($city);
    }

    public function rules()
    {
        return [
            'nome' => 'required|unique:bairros,nome',
            'cidade_id' => 'required|numeric'
        ];
    }

     public function AsController(ActionRequest $request)
     {
        $this->handle($request->validated());
        flash()->addSuccess('Bairro criado com sucesso.');
        return \redirect()->back();
     }
}
