<?php

namespace App\Http\Controllers\Management\Province;

use App\Data\AlertDto;
use App\Data\ProvinceData;
use App\Models\Province;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Throwable;

class UpdateProvinceController
{
    public function __invoke(
        Province $province,
        ProvinceData $data,
    ): RedirectResponse {
        try {
            DB::transaction(
                fn () => $province->update([
                    'name' => $data->name,
                ])
            );

            return redirect()
                ->back()
                ->with(
                    'messages',
                    AlertDto::success(
                        __(':feature updated successfully', [
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
                        __('Error updating :feature', [
                            'feature' => __('Province'),
                        ])
                    )
                );
        }
    }
}
