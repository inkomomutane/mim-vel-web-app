<?php

namespace App\Actions\Website\Api;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Lorisleiva\Actions\Concerns\AsController;
use Vite;

class GetImovelsApi
{
    use AsController;

    public function handle()
    {
        return \App\Data\ImovelData::collection(
            \App\Models\Imovel::with(['bairro.cidade', 'condicao', 'imovelFor', 'media' => function (MorphMany $query) {
                $query->where('collection_name', 'posts');
            }, ])->paginate(9));
    }

    public function AsController()
    {
        return response()->json([
            'imovels' => $this->handle(),
        ]);
    }
}
