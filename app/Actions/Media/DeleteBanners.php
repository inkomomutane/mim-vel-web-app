<?php

namespace App\Actions\Media;

use App\Models\Banner;
use Lorisleiva\Actions\Concerns\AsController;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class DeleteBanners
{
    use AsController;

    public function AsController(Media $media)
    {
        try {
            $media->delete();
            flash()->addSuccess('Banner deletado com sucesso.');
        } catch (\Throwable $th) {
            flash()->addError('Erro ao deletar banner!');
        }
        return redirect()->back();
    }
}
