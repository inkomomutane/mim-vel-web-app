<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class UserData extends Data
{
    public function __construct(
        public string  $name,
        public string  $email,
        public ?string $contact,
        public ?string $location,
        public bool    $active,
        public ?string $auth0_id
    )
    {
    }
}
