<?php

namespace App\Actions\Website;

use App\Actions\Page\GetPage;
use App\Models\Page;
use App\Models\Politica;
use App\Support\Enums\Pages;
use Lorisleiva\Actions\Concerns\AsController;

class GetPolicies
{
    use AsController;

    public function asController()
    {
        return view('website.policy', [
            'policy' => Politica::first(),
            'page' =>  GetPage::run()->with('media')->first()?->getFirstMedia(Pages::POLICY),
        ]);
    }
}
