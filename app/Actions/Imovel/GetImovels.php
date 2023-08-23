<?php

namespace App\Actions\Imovel;

use App\Actions\UserTreeInIdArray;
use App\Data\ImovelData;
use App\Models\Imovel;
use App\Models\User;
use App\Support\Traits\GetImovelsWithSearchScope;
use Auth;
use Illuminate\Support\Collection;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class GetImovels
{
    use AsAction;
    use AsController;
    use GetImovelsWithSearchScope;

    public function handle(?string $term, User $user)
    {
        if ($user->hasAnyRole('Super-Admin', 'Admin')) {
            return ImovelData::collection(
                $this->getImovels($term)->paginate(5)->withQueryString()
            );
        } else {
            /** @var Collection<Imovel> $imovels */
            $imovels = $this->getImovels($term);

            return ImovelData::collection($imovels->whereIn('corretor_id', UserTreeInIdArray::run($user))->paginate(5)->withQueryString());
        }
    }

    public function AsController(): \Inertia\Response
    {
        return Inertia::render('Imovel/Index', [
            'imovels' => $this->handle(request()->search, Auth::user()),
        ]);
    }
}
