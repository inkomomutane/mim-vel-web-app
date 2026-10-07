<?php

namespace App\Http\Controllers\Management\PropertyFor;

use App\Data\AlertDto;
use App\Models\PropertyFor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Throwable;

class DeletePropertyForController
{
    public function __invoke(
        PropertyFor $propertyFor,
    ): RedirectResponse {
        try {
            DB::transaction(
                fn () => $propertyFor->delete()
            );

            return redirect()
                ->back()
                ->with(
                    'messages',
                    AlertDto::success(
                        __(':feature processed successfully', [
                            'feature' => __('Transaction Type'),
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
                            'feature' => __('Transaction Type'),
                        ])
                    )
                );
        }
    }
}
