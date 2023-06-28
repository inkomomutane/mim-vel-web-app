<?php

namespace App\Actions\Imovel\image;

use Lorisleiva\Actions\Concerns\AsController;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class DeleteImovelImages
{
    use AsController;

    public function AsController(Media $media)
    {
        try {
            $media->delete();
            flash()->addSuccess('Imagem deletada com sucesso.');
        } catch (\Throwable $th) {
            flash()->addError('Erro ao deletar imagem!');
        }

        return redirect()->back();
    }
}
