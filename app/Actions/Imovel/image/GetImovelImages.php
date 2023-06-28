<?php

namespace App\Actions\Imovel\image;

use App\Data\MediaData;
use App\Models\Imovel;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class GetImovelImages
{
    use AsAction;
    use AsController;

    public function handle(Imovel $imovel)
    {
        return MediaData::collection($imovel->getMedia('posts')->paginate(5));
    }

    public function asController(Imovel $imovel)
    {
        return Inertia::render('Imovel/Image/Index', [
            'images' => $this->handle($imovel),
            'imovel' => $imovel->slug,
        ]);
    }
}
