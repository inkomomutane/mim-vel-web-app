<?php

namespace App\Actions\Province;

use App\Data\ProvinceData;
use App\Models\Province;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class GetProvince
{
    use AsAction;
    use AsController;

    public function handle(int $id): ?ProvinceData
    {
        return Province::find($id)?->getData();
    }

    public function asController(int $id)
    {
        return $this->handle($id);
    }
}
