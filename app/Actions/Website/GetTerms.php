<?php

namespace App\Actions\Website;

use App\Actions\Page\GetPage;
use App\Models\Termo;
use App\Support\Enums\Pages;
use Lorisleiva\Actions\Concerns\AsController;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use Vite;

class GetTerms
{
    use AsController;

    public function asController()
    {
        return view('website.terms', [
            'terms' => Termo::first(),
            'page' => GetPage::run()->with('media')->first()?->getFirstMedia(Pages::TERMS),
            'seoData' => new SEOData(
                title: 'Termos & condições',
                description:'Termos & condições',
                site_name:'Termos & condições',
                url: route('website.terms'),
                canonical_url:route('website.terms'),
                image: Vite::asset('resources/js/images/logo/logo.png'),
                favicon:Vite::asset('resources/js/images/logo/favicon.ico'),
            )
        ]);
    }
}
