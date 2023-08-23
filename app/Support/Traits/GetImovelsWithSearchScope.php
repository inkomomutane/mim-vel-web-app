<?php

namespace App\Support\Traits;

use App\Models\Imovel;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait GetImovelsWithSearchScope
{
    /**
     * @return Collection<Imovel>
     *
     **/
    private function getImovels(string $term = null, bool $approved = true)
    {

        $query = Imovel::query()->when($term, function ($query, $search) {
            $query->where('titulo', 'like', '%'.$search.'%')
                ->orWhereRelation('bairro', 'nome', 'like', '%'.$search.'%')
                ->orWhereRelation('bairro.cidade', 'nome', 'like', '%'.$search.'%')
                ->orWhereRelation('bairro.cidade.province', 'name', 'like', '%'.$search.'%');
            $query->with(['corretor', 'regraDeNegocio', 'intermediationRule', 'bairro.cidade.province', 'media' => function (MorphMany $query) {
                $query->where('collection_name', 'posts')->first();
            }, ]);
        })->with(['corretor', 'regraDeNegocio', 'bairro.cidade.province', 'intermediationRule', 'media' => function (MorphMany $query) {
            $query->where('collection_name', 'posts');
        }, ]);

        if (! $approved) {
            return $query->withoutApproved()->orderBy('updated_at', 'desc')->get();
        }

        return $query->withApproved()->orderBy('updated_at', 'desc')->get();
    }
}
