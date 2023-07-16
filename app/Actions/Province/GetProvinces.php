<?php

namespace App\Actions\Province;

use App\Data\ProvinceData;
use App\Models\Province;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class GetProvinces
{
    use AsAction;
    use AsController;

    public function handle(string $term = null)
    {
        return ProvinceData::collection(
            Province::query()
                ->when($term, function ($query, $search) {
                    $query->where('name', 'like', '%'.$search.'%');
                })->
            orderBy('created_at', 'desc')->paginate(5)->withQueryString()
        );
    }

    public function AsController(): \Inertia\Response
    {
        return Inertia::render('Province/Index', [
            'provinces' => $this->handle(request()->search),
        ]);
    }
}
