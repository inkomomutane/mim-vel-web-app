<?php

namespace App\Http\Controllers\Management\City;

use App\Data\AlertDto;
use App\Models\City;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Throwable;

class DeleteCityController
{
    public function __invoke(
        City $city,
    ): RedirectResponse {
        try {
            DB::transaction(
                fn () => $city->delete()
            );

            return redirect()
                ->back()
                ->with(
                    'messages',
                    AlertDto::success(
                        __(':feature processed successfully', [
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
                        __('Error processing :feature', [
                            'feature' => __('City'),
                        ])
                    )
                );
        }
    }
}
