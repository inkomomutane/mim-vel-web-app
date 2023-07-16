<?php

namespace App\Actions\Website;

use App\Actions\Page\GetPage;
use App\Models\Termo;
use App\Support\Enums\Pages;
use Lorisleiva\Actions\Concerns\AsController;

class GetTerms
{
    use AsController;

    public function asController()
    {
        return view('website.terms', [
            'terms' => Termo::first(),
            'page' => GetPage::run()->with('media')->first()?->getFirstMedia(Pages::TERMS),
        ]);
    }
}
