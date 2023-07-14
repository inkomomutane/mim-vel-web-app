<?php

namespace App\Actions\Website;

use App\Actions\Page\GetPage;
use App\Models\Banner;
use App\Models\Imovel;
use App\Models\Page;
use App\Support\Enums\Pages;
use Lorisleiva\Actions\Concerns\AsController;

class Welcome
{
    use AsController;

    public function asController()
    {
        //
        return view('website.welcome', [
            'page' => GetPage::run()->with('media')->first()?->getFirstMedia(Pages::HOME),
            'thumb' =>  GetPage::run()->with('media')->first()?->getFirstMedia(Pages::HOME)?->responsiveImages()?->getPlaceholderSvg(),
            'relevantImovels' => $this->getRelevantImovels(),
            'lastestImovels' => Imovel::with(['bairro.cidade', 'intermediationRule', 'imovelFor', 'tipo_de_imovel', 'status', 'comentarios', 'ratings'])->latest('created_at')->get()->take(6),
            'banners' => Banner::with('media')->first(),
        ]);
    }

    private function getRelevantImovels()
    {
        return Imovel::with(['bairro.cidade', 'intermediationRule', 'imovelFor', 'tipo_de_imovel', 'status', 'comentarios', 'ratings'])->orderByUniqueViews()->get()->take(6);
    }
}
