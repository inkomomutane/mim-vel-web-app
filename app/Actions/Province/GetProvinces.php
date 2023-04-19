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


    public function handle()
    {
        return ProvinceData::collection(Province::orderBy('created_at','desc')->paginate(5));
    }

    public function AsController() : \Inertia\Response
    {
        return Inertia::render('Province/Index',[
            'provinces' => $this->handle()
        ]);
    }
}
