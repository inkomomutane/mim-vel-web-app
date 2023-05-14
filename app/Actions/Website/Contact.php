<?php

namespace App\Actions\Website;

use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsController;

class Contact
{
    use AsController;

    public function asController()
    {
        return Inertia::render('Website/Contact');
    }
}
