<?php

namespace App\Http\Controllers\Website;

use App\Data\AdsData;
use App\Data\CardPropertyData;
use App\Models\Banner;
use App\Models\Page;
use App\Models\Property;
use Inertia\Inertia;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use Vite;

class HomePageController
{
     public function __invoke()
     {
         $page = Page::first();
         return Inertia::render('Web/Welcome',[
             'latest'  => CardPropertyData::collect(Property::withApproved()
                 ->with([
                     'media',
                     'condicao',
                     'tipo_de_imovel',
                     'status',
                     'corretor',
                     'imovelFor',
                     'bairro.cidade',
                 ])
                 ->withAvg('ratings', 'rating')
                 ->withCount('ratings')
                 ->latest('published_at')
                 ->limit(15)
                 ->get()),
             'relevant'  => CardPropertyData::collect(Property::withApproved()
                 ->with([
                     'media',
                     'condicao',
                     'tipo_de_imovel',
                     'status',
                     'corretor',
                     'imovelFor',
                     'bairro.cidade',
                 ])
                 ->withAvg('ratings', 'rating')
                 ->withCount('ratings')
                 ->orderByUniqueViews()
                 ->limit(15)
                 ->get()),
             'ads' =>  AdsData::collect(Banner::with('media')->get()),
             'seoData'   => new SEOData(
                 title: $page->name,
                 description: $page->content,
                 image: Vite::asset('resources/js/images/logo/logo.png'),
                 url: route('home'),
                 site_name: 'Mimóvel',
                 favicon: Vite::asset('resources/js/images/logo/favicon.ico'),
                 canonical_url: route('home'),
             ),
         ]);
     }
}
