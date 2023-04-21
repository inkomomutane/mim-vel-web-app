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

    public $orderByterms = ['name','id'];
    public $ascTerms  = ['asc','desc'];


    public function handle(?string $term = null,?string $orderBy = null,?string $asc)
    {
        return ProvinceData::collection(
            Province::query()
            ->when($term,function($query, $search) {
                $query->where('name','like','%'.$search.'%');
            })->
            orderBy( collect($this->orderByterms)->contains($orderBy) ? $orderBy : 'created_at', collect($this->ascTerms)->contains($asc) ? $asc : 'desc' )->paginate(5)->withQueryString()
        );
    }

    public function AsController() : \Inertia\Response
    {
        return Inertia::render('Province/Index',[
            'provinces' => $this->handle(request()->search,request()->order_by,request()->asc ),
        ]);
    }

}
