<?php

namespace App\Actions\Website;

use App\Models\Page;
use App\Models\Termo;
use App\Support\Enums\Pages;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsController;

class GetTerms
{
    use AsController;

    public function asController()
    {
        return view('website.terms', [
            'terms' => Termo::first(),
            'page' => Page::with('media')->first()?->getFirstMedia(Pages::TERMS),
        ]);
    }
}
