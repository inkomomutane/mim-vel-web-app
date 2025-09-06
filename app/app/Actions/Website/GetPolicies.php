<?php

namespace App\Actions\Website;

use App\Actions\Page\GetPage;
use App\Models\Politica;
use App\Support\Enums\Pages;
use Lorisleiva\Actions\Concerns\AsController;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use Vite;

class GetPolicies
{
    use AsController;

    public function asController()
    {
        return view('website.policy', [
            'policy' => Politica::first(),
            'page' => GetPage::run()->with('media')->first()?->getFirstMedia(Pages::POLICY),
            'seoData' => new SEOData(
                title: 'Políticas de privacidade',
                description: 'Políticas de privacidade',
                site_name: 'Políticas de privacidade',
                url: route('website.policy'),
                canonical_url: route('website.policy'),
                image: Vite::asset('resources/js/images/logo/logo.png'),
                favicon: Vite::asset('resources/js/images/logo/favicon.ico'),
            ),
        ]);
    }
}
