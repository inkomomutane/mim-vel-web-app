<?php

namespace App\Actions\Imovel;

use App\Actions\UserTreeInIdArray;
use App\Models\Property;
use App\Models\User;
use App\Support\Enums\SystemRoles;
use Lorisleiva\Actions\Concerns\AsAction;

class CountNotApprovedImovels
{
    use AsAction;

    public function handle(?User $user)
    {

        if (is_null($user)) {
            return 0;
        }

        /** @var Collection<Property> $imovels */
        $imovels = Property::withoutApproved();

        if ($user->hasAnyRole(SystemRoles::SUPERADMIN, SystemRoles::ADMIN)) {
            return $imovels->count();
        }

        return $imovels->whereIn('corretor_id', UserTreeInIdArray::run($user))->count();
    }
}
