<?php

namespace App\Actions\City;

use App\Data\CityData;
use App\Data\ProvinceData;
use App\Models\Cidade;
use App\Models\Province;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class GetCities
{
    use AsAction;
    use AsController;

    public function handle(string $term = null)
    {
        return CityData::collection(
            Cidade::query()
                ->when($term, function ($query, $search) {
                    $query->where('nome', 'like', '%'.$search.'%');
                    $query->with('province');
                })->with('province')->
            orderBy('created_at', 'desc')->paginate(5)->withQueryString()
        );
    }

    public function AsController(): \Inertia\Response
    {
        return Inertia::render('City/Index', [
            'cities' => $this->handle(request()->search),
            'provinces' => ProvinceData::collection(Province::all()),
        ]);
    }
}
