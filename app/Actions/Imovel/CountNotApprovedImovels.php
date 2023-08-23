<?php

namespace App\Actions\Imovel;

use App\Actions\UserTreeInIdArray;
use App\Models\Imovel;
use App\Models\User;
use App\Support\Enums\SystemRoles;
use Lorisleiva\Actions\Concerns\AsAction;

class CountNotApprovedImovels
{
    use AsAction;

    public function handle(User $user)
    {

        if (is_null($user)) {
            return 0;
        }

        /** @var Collection<Imovel> $imovels */
        $imovels = Imovel::withoutApproved()->get();

        if ($user->hasAnyRole(SystemRoles::SUBADMIN,SystemRoles::ADMIN,SystemRoles::SUBADMIN)) {
            return $imovels->count();
        }

        return $imovels->whereIn('corretor_id', UserTreeInIdArray::run($user
            ->load('createdUsers')))->count();
    }
}
