<?php

namespace App\Actions\ImovelType;

use App\Models\TipoDeImovel;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsController;

class UpdateImovelType
{
    use AsController;
    public function rules() : array {
        return [
            'nome' => 'required|string',
            'images' => '',
            'images.*' => 'image|max:15360',
        ];
    }

    public function asController(TipoDeImovel $imovelType,ActionRequest $actionRequest)
    {

        $imovelType->nome = $actionRequest->nome;
        $imovelType->save();

        try {
            if ($actionRequest->file('images')){

                foreach($actionRequest->file('images') as $key => $file)
                {
                    $imovelType->addMedia($file)
                    ->toMediaCollection('icons');
                }
            }

            flash()->addSuccess('Tipo de imóvel actualizado com sucesso');
        } catch (\Throwable $th) {
            flash()->addError('Erro ao actualizar tipo de imóvel.');
        }

        return \redirect()->back();
    }
}
