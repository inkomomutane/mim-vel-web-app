<?php

namespace App\Actions\Imovel;

use App\Actions\UserTreeInIdArray;
use App\Models\Imovel;
use App\Models\User;
use Illuminate\Support\Collection;
use Lorisleiva\Actions\Concerns\AsAction;

class ImovelTrashCount
{
    use AsAction;

    /**
     * @return int
     */
    public function handle(User $user = null)
    {
        if (is_null($user)) {
            return 0;
        }

        /** @var Collection<Imovel> $imovels */
        $imovels = Imovel::onlyTrashed()->get();
        if ($user->hasAnyRole('Super-Admin', 'Admin')) {
            return $imovels->count();
        }

        return $imovels->whereIn('corretor_id', UserTreeInIdArray::run($user
            ->load('createdUsers')))->count();
    }
}
