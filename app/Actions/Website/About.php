<?php

namespace App\Actions\Website;

use App\Actions\Page\GetPage;
use App\Models\Page;
use App\Support\Enums\Pages;
use Lorisleiva\Actions\Concerns\AsController;

class About
{
    use AsController;

    public function asController()
    {
        return view('website.about', [
            'page' =>  GetPage::run()->with('media')
                ->first()?->getFirstMedia(Pages::ABOUT),
        ]);
    }
}
