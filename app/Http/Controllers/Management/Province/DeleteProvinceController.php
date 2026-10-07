<?php

namespace App\Http\Controllers\Management\Province;

use App\Data\AlertDto;
use App\Models\Province;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Throwable;

class DeleteProvinceController
{
    public function __invoke(
        Province $province,
    ): RedirectResponse {
        try {
            DB::transaction(
                fn () => $province->delete()
            );

            return redirect()
                ->back()
                ->with(
                    'messages',
                    AlertDto::success(
                        __(':feature processed successfully', [
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
                        __('Error processing :feature', [
                            'feature' => __('Province'),
                        ])
                    )
                );
        }
    }
}
