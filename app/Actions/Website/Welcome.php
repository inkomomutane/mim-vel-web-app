<?php

namespace App\Actions\Website;

use App\Models\Imovel;
use App\Models\Page;
use App\Support\Enums\Pages;
use Lorisleiva\Actions\Concerns\AsController;

class Welcome
{
    use AsController;

    public function asController()
    {
        return view('website.welcome',[
            'page' => Page::with('media')->first()?->getFirstMedia(Pages::HOME),
            'relevantImovels' => $this->getRelevantImovels(),
            'lastestImovels' => Imovel::with(['bairro.cidade','imovelFor'])->latest('created_at')->get()->take(6)
        ]);
    }


    private function getRelevantImovels(){
        return Imovel::with(['bairro.cidade','imovelFor'])->orderByUniqueViews()->get()->take(6);
    }
}
