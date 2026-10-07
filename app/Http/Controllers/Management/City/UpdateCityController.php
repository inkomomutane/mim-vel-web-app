<?php

namespace App\Http\Controllers\Management\City;

use App\Data\AlertDto;
use App\Data\CityData;
use App\Models\City;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Throwable;

class UpdateCityController
{
    public function __invoke(
        City $city,
        CityData $data,
    ): RedirectResponse {
        try {
            DB::transaction(
                fn () => $city->update([
                    'name' => $data->name,
                    'province_id' => $data->province_id,
                ])
            );

            return redirect()
                ->back()
                ->with(
                    'messages',
                    AlertDto::success(
                        __(':feature updated successfully', [
                            'feature' => __('City'),
                        ])
                    )
                );
        } catch (Throwable $throwable) {
            report($throwable);

            return redirect()
                ->back()
                ->with(
                    'messages',
                    AlertDto::error(
                        __('Error updating :feature', [
                            'feature' => __('City'),
                        ])
                    )
                );
        }
    }
}
