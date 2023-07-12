<?php

namespace App\Actions\Website;

use App\Data\ImovelData;
use App\Models\Imovel;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsController;

class GetImovels
{
    use AsController;

    public function handle(?string $term = null)
    {
        return ImovelData::collection(
            Imovel::query()
                ->when($term, function ($query, $search) {

                    $query->where('titulo', 'like', '%'.$search.'%')
                        ->orWhereRelation('bairro', 'nome', 'like', '%'.$search.'%')
                        ->orWhereRelation('bairro.cidade', 'nome', 'like', '%'.$search.'%')
                        ->orWhereRelation('bairro.cidade.province', 'name', 'like', '%'.$search.'%');

                    $query->with(['bairro', 'media' => function (MorphMany $query) {
                        $query->where('collection_name', 'posts')->first();
                    }, ]);

                })->with(['bairro.cidade','regraDeNegocio', 'media' => function (MorphMany $query) {
                    $query->where('collection_name', 'posts');
                }, ])->orderBy('created_at', 'desc')->paginate(12)->withQueryString()
        );
    }

    public function AsController()
    {
        return Inertia::render('Website/Imovels',[
            'imovels' => $this->handle()
        ]);
    }
}
