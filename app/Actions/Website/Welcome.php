<?php

namespace App\Actions\Website;

use App\Actions\Page\GetPage;
use App\Models\Banner;
use App\Models\HotelMetaData;
use App\Models\Imovel;
use App\Support\Enums\Pages;
use Lorisleiva\Actions\Concerns\AsController;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use Vite;

class Welcome
{
    use AsController;

    public function asController()
    {
        $page = GetPage::run();

        return view('website.welcome', [
            'page' => GetPage::run()->with('media')->first()?->getFirstMedia(Pages::HOME),
            'hotels' => $this->getRelevantHotelsRooms(),
            'thumb' => GetPage::run()->with('media')->first()?->getFirstMedia(Pages::HOME)?->responsiveImages()?->getPlaceholderSvg(),
            'relevantImovels' => $this->getRelevantImovels(),
            'lastestImovels' => Imovel::withApproved()->with(['bairro.cidade', 'media', 'intermediationRule', 'imovelFor', 'tipo_de_imovel', 'status', 'comentarios', 'ratings'])->latest('created_at')->get()->take(10),
            'banners' => Banner::with('media')->first(),
            'logo' => GetPage::run()->with('media')->first()?->getFirstMedia(Pages::LOGO),
            'seoData' => new SEOData(
                title: $page->name,
                description: $page->content,
                image: Vite::asset('resources/js/images/logo/logo.png'),
                url: route('welcome'),
                site_name: 'Mimóvel',
                favicon: Vite::asset('resources/js/images/logo/favicon.ico'),
                canonical_url: route('welcome'),
            ),
            'imovels_count' => Imovel::count(),
            'hotels_count' => HotelMetaData::whereHas('hotels')->count(),
        ]);
    }

    private function getRelevantHotelsRooms()
    {

        return HotelMetaData::with('hotels.media')->whereHas('hotels')->get();

    }

    private function getRelevantImovels()
    {
        return Imovel::withApproved()->with(['bairro.cidade', 'media', 'intermediationRule', 'imovelFor', 'tipo_de_imovel', 'status', 'comentarios', 'ratings'])->orderByUniqueViews()->get()->take(10);
    }
}
