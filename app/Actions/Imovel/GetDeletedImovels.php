<?php

namespace App\Actions\Imovel;

use App\Actions\UserTreeInIdArray;
use App\Data\ImovelData;
use App\Models\Imovel;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class GetDeletedImovels
{
    use AsAction;
    use AsController;

    public function handle(?string $term, User $user)
    {
        if ($user->hasAnyRole('Super-Admin', 'Admin')) {
            return ImovelData::collection(
                $this->getTrashedImovels($term)->paginate(5)->withQueryString()
            );
        } else {
            /** @var Collection<Imovel> $imovels */
            $imovels = $this->getTrashedImovels($term);

            return ImovelData::collection($imovels->whereIn('corretor_id', UserTreeInIdArray::run($user
                ->load('createdUsers')))->paginate(5)->withQueryString());
        }
    }

    /**
     * @return Collection<Imovel>
     *
     **/
    private function getTrashedImovels(?string $term = null)
    {
        return Imovel::query()
            ->when($term, function ($query, $search) {
                $query->where('titulo', 'like', '%'.$search.'%');
                $query->with(['corretor', 'regraDeNegocio', 'intermediationRule', 'bairro.cidade.province', 'media' => function (MorphMany $query) {
                    $query->where('collection_name', 'posts')->first();
                }, ]);
            })->with(['corretor', 'regraDeNegocio', 'bairro.cidade.province', 'intermediationRule', 'media' => function (MorphMany $query) {
                $query->where('collection_name', 'posts');
            }, ])->onlyTrashed()->orderBy('updated_at', 'desc')->get();
    }

    public function AsController(): \Inertia\Response
    {
        return Inertia::render('Imovel/Trash', [
            'imovels' => $this->handle(request()->search, Auth::user()),
        ]);
    }
}
