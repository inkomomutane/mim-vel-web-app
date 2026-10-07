<?php

namespace App\Http\Controllers\Management\Province;

use App\Data\AlertDto;
use App\Data\ProvinceData;
use App\Models\Province;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Throwable;

class StoreProvinceController
{
    public function __invoke(
        ProvinceData $data,
    ): RedirectResponse {
        try {
            DB::transaction(
                fn () => Province::create([
                    'name' => $data->name,
                ])
            );

            return redirect()
                ->back()
                ->with(
                    'messages',
                    AlertDto::success(
                        __(':feature created successfully', [
                            'feature' => __('Province'),
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
                            'feature' => __('Province'),
                        ])
                    )
                );
        }
    }
}
