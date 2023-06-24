<?php

namespace App\Actions\Website\Api;

use App\Data\ImovelData;
use App\Models\Imovel;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Lorisleiva\Actions\Concerns\AsController;

class GetImovelsApi
{
    use AsController;

    public function handle()
    {
        // 'bairro',
        //         'condicao',
        //         'tipo_de_imovel',
        //         'status',
        //         'corretor',
        //         'imovelFor',
        return \App\Data\ImovelData::collection(
            \App\Models\Imovel::with([ 'bairro.cidade','condicao','imovelFor', 'media' => function (\Illuminate\Database\Eloquent\Relations\MorphMany $query) {
                    $query->where('collection_name', 'posts');
                },])->paginate(9));
    }


    public function AsController()
    {
        return response()->json([
            'imovels' => $this->handle()
        ]);
    }
}
