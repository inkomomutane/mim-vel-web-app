<?php

namespace App\Actions\Website;

use App\Models\Politica;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsController;

class GetPolicies
{
    use AsController;

    public function asController()
    {
        return Inertia::render('Website/Policy', [
            'policy' => Politica::first()->getData(),
        ]);
    }
}
