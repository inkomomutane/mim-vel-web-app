<?php

namespace App\Actions\Website;

use App\Models\Termo;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsController;

class GetTerms
{
    use AsController;

    public function asController()
    {
        return Inertia::render('Website/Terms', [
            'terms' => Termo::first()->getData(),
        ]);
    }
}
