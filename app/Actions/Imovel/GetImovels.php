<?php

namespace App\Actions\Imovel;

use App\Data\ImovelData;
use App\Models\Imovel;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class GetImovels
{
    use AsAction;
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

                })->with(['bairro', 'media' => function (MorphMany $query) {
                    $query->where('collection_name', 'posts');
                }, ])->orderBy('created_at', 'desc')->paginate(5)->withQueryString()
        );
    }

    public function AsController(): \Inertia\Response
    {
        return Inertia::render('Imovel/Index', [
            'imovels' => $this->handle(request()->search),
        ]);
    }
}
