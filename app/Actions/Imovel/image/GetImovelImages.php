<?php

namespace App\Actions\Imovel\image;

use App\Data\MediaData;
use App\Models\Property;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class GetImovelImages
{
    use AsAction;
    use AsController;

    public function handle(Property $imovel)
    {
        return MediaData::collection($imovel->getMedia('posts')->paginate(5));
    }

    public function asController(Property $imovel)
    {
        return Inertia::render('Imovel/Image/Index', [
            'images' => $this->handle($imovel),
            'imovel' => $imovel->slug,
        ]);
    }
}
