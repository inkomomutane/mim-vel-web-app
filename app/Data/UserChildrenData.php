<?php

namespace App\Data;

use App\Models\User;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Lazy;

/** @typescript */
class UserChildrenData extends Data
{
    public function __construct(
        public ?int $id,
        /** @var UserChildrenData[] * */
        public Lazy|null|DataCollection $users
    ) {
    }

    public static function fromModel(User $user)
    {
        return new self(
            id: $user->id,
            users: Lazy::whenLoaded('createdUsers', $user->load('createdUsers'), fn () => UserChildrenData::collection($user->createdUsers))
        );
    }
}
