<?php

namespace App\Actions\Website;

use App\Models\Banner;
use App\Models\Imovel;
use App\Models\Page;
use App\Support\Enums\Pages;
use Lorisleiva\Actions\Concerns\AsController;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Welcome
{
    use AsController;

    public function asController()
    {
        //
        return view('website.welcome',[
            'page' => Page::with('media')->first()?->getFirstMedia(Pages::HOME),
            'thumb' =>  Page::with('media')->first()?->getFirstMedia(Pages::HOME)->responsiveImages()->getPlaceholderSvg(),
            'relevantImovels' => $this->getRelevantImovels(),
            'lastestImovels' => Imovel::with(['bairro.cidade','imovelFor'])->latest('created_at')->get()->take(6),
            'banners' => Banner::with('media')->first()
        ]);
    }


    private function getRelevantImovels(){
        return Imovel::with(['bairro.cidade','imovelFor'])->orderByUniqueViews()->get()->take(6);
    }
}
