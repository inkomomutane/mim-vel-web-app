<?php

namespace App\Actions\Image;

use Exception;
use Illuminate\Http\RedirectResponse;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class DeleteImageAction
{
    use AsAction;

    public function asController(Media $media): RedirectResponse
    {
        try {
            $media->delete();
            flash()->addSuccess('Imagem excluída com sucesso');
            return redirect()->back();
        }catch (Exception) {
           flash()->addError('Erro ao excluir a imagem');
           return redirect()->back();
        }
    }
}
