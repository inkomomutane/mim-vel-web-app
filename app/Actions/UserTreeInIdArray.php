<?php

namespace App\Actions;

use App\Data\UserChildrenData;
use App\Models\User;
use Arr;
use Lorisleiva\Actions\Concerns\AsAction;

class UserTreeInIdArray
{
    use AsAction;

    public function handle(User $user)
    {
        return  User::whereDescendantOf(id: $user->id, andSelf: true)->get()->pluck('id')->toArray();
    }
}
