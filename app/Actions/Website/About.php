<?php

namespace App\Actions\Website;

use App\Actions\Page\GetPage;
use App\Support\Enums\Pages;
use Lorisleiva\Actions\Concerns\AsController;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use Vite;

class About
{
    use AsController;

    public function asController()
    {
        return view('website.about', [
            'page' => GetPage::run()->with('media')
                ->first()?->getFirstMedia(Pages::ABOUT),
                'seoData' => new SEOData(
                    title: 'Sobre-nos',
                    description:'Sobre-nos',
                    site_name:'Sobre-nos',
                    url: route('website.about'),
                    canonical_url:route('website.about'),
                    image: Vite::asset('resources/js/images/logo/logo.png'),
                    favicon:Vite::asset('resources/js/images/logo/favicon.ico'),
                )
        ]);
    }
}
