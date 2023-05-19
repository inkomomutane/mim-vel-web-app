<?php

namespace App\Actions\ImovelType;

use App\Models\TipoDeImovel;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsController;

class CreateImovelType
{
    use AsController;
    public function rules() : array {
        return [
            'nome' => 'required|string',
            'images' => 'required',
            'images.*' => 'required|image|max:15360',
        ];
    }

    public function asController(ActionRequest $actionRequest)
    {

        $imovelType = TipoDeImovel::create([
            'nome' => $actionRequest->nome
        ]);

        try {

            if ($actionRequest->file('images')){

                foreach($actionRequest->file('images') as $key => $file)
                {
                    $imovelType->addMedia($file)
                    ->toMediaCollection('icons');
                }
            }

            flash()->addSuccess('Tipo de imóvel criado com sucesso');
        } catch (\Throwable $th) {
            flash()->addError('Erro ao criar tipo de imóvel.');
        }

        return \redirect()->back();
    }
}
