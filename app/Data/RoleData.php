<?php

namespace App\Data;

use Spatie\LaravelData\Data;
use Spatie\Permission\Models\Role;

/** @typescript */
class RoleData extends Data
{
    public function __construct(
      public ?int $id,
      public ?string $name,
    ) {
    }

    public static function fromModel(Role $role)
    {
        return new self(
            id: $role->id,
            name: $role->name,
        );
    }
}
