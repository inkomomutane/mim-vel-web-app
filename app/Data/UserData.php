<?php

namespace App\Data;

use App\Models\User;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;

/** @typescript */
class UserData extends Data
{
    public function __construct(
        public readonly ?int $id,
        public readonly ?string $name,
        public readonly ?string $email,
        public readonly ?string $contacto,
        public readonly ?string $location,
        public readonly ?bool $active,
        public readonly Lazy|null|RoleData $role
    ) {
    }

    public static function fromModel(User $user)
    {
        return new self(
            id: $user->id,
            name: $user->name,
            email: $user->email,
            contacto: $user->contacto,
            location: $user->location,
            active: $user->active,
            role: Lazy::whenLoaded('role',$user,fn()=> is_null($user->roles()->first()) ? null : RoleData::fromModel($user->roles()->first())
        )
    );
    }
}
