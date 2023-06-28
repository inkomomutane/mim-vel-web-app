<?php

namespace App\Actions\Imovel\image;

use App\Models\Imovel;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class AddImovelImages
{
    use AsAction;
    use AsController;

    public function rules(): array
    {
        return [
            'images' => 'required',
            'images.*' => 'required|image|max:15360',
        ];
    }

    public function asController(ActionRequest $actionRequest, Imovel $imovel)
    {

        try {

            if ($actionRequest->file('images')) {

                foreach ($actionRequest->file('images') as $key => $file) {
                    $imovel->addMedia($file)
                        ->withResponsiveImages()
                        ->toMediaCollection('posts', 'posts');
                }
            }

            flash()->addSuccess('Imagens carregadas com sucesso');
        } catch (\Throwable $th) {
            flash()->addError('Erro ao carregar imagens');
        }

        return \redirect()->back();
    }
}
