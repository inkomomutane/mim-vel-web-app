<?php

namespace App\Http\Controllers\Management\City;

use App\Data\AlertDto;
use App\Data\CityData;
use App\Models\City;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Throwable;

class StoreCityController
{
    public function __invoke(
        CityData $data,
    ): RedirectResponse {
        try {
            DB::transaction(
                fn () => City::create([
                    'name' => $data->name,
                    'province_id' => $data->province_id,
                ])
            );

            return redirect()
                ->back()
                ->with(
                    'messages',
                    AlertDto::success(
                        __(':feature created successfully', [
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
                        __('Error creating :feature', [
                            'feature' => __('City'),
                        ])
                    )
                );
        }
    }
}
