<?php

namespace App\Http\Controllers\Website;

use App\Data\AdsData;
use App\Data\CardPropertyData;
use App\Models\Banner;
use App\Models\Page;
use App\Models\Property;
use Illuminate\Database\Eloquent\Builder;
use Inertia\Inertia;
use Inertia\Response;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use Vite;

class HomePageController
{
    public function __invoke(): Response
    {
        $page = Page::query()
            ->first([
                'name',
                'content',
            ]);

        $properties = $this->propertiesQuery();

        $latest = (clone $properties)
            ->latest('published_at')
            ->limit(15)
            ->get();

        $relevant = (clone $properties)
            ->orderByUniqueViews()
            ->limit(15)
            ->get();

        return Inertia::render('Web/Welcome', [
            'latest' => CardPropertyData::collect($latest),

            'relevant' => CardPropertyData::collect($relevant),

            'ads' => AdsData::collect(
                Banner::query()
                    ->with('media')
                    ->get(),
            ),

            'seoData' => new SEOData(
                title: $page?->name,
                description: $page?->content,

                image: Vite::asset(
                    'resources/js/images/logo/logo.png',
                ),

                url: route('home'),

                site_name: 'Mimóvel',

                favicon: Vite::asset(
                    'resources/js/images/logo/favicon.ico',
                ),

                canonical_url: route('home'),
            ),
        ]);
    }

    private function propertiesQuery(): Builder
    {
        return Property::query()
            ->select([
                'id',

                'title',
                'price',
                'description',
                'slug',

                'bathrooms',
                'year',
                'floors',
                'area',
                'bedrooms',
                'suites',
                'garages',
                'pools',

                'address',
                'map',

                'for_rent',

                'published_at',
                'views',

                'neighborhood_id',
                'property_condition_id',
                'property_type_id',
                'status_id',
                'broker_id',

                'business_rule_id',
                'property_for_id',
                'intermediation_rule_id',

                'details',

                'approved',
                'approved_by_id',
                'approved_at',
            ])
            ->withApproved()
            ->with([
                'media',

                'condition',

                'propertyType',

                'status',

                'broker',

                'businessRule',

                'propertyFor',

                'neighborhood:id,name,slug,city_id',

                'neighborhood.city:id,name,slug,province_id',

                'neighborhood.city.province:id,slug',
            ]);
    }
}
