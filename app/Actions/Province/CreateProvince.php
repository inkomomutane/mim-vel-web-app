<?php

namespace App\Actions\Province;

use App\Data\ProvinceData;
use App\Models\Province;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class CreateProvince
{
    use AsAction;
    use AsController;

    public function handle(ProvinceData $province)
    {
        return Province::create($province->all());
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:provinces,name',
        ];
    }

     public function AsController(ActionRequest $request)
     {
         $this->handle(ProvinceData::from($request->validated()));
         flash()->addSuccess('Province created successfcul.');

         return \redirect()->back();
     }
}
