<?php

namespace App\Http\Controllers\Management\PropertyFor;

use App\Data\AlertDto;
use App\Data\PropertyForData;
use App\Models\PropertyFor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Throwable;

class UpdatePropertyForController
{
    public function __invoke(
        PropertyFor $propertyFor,
        PropertyForData $data,
    ): RedirectResponse {
        try {
            DB::transaction(
                fn () => $propertyFor->update([
                    'name' => $data->name,
                    'slug' => $data->slug,
                ])
            );

            return redirect()
                ->back()
                ->with(
                    'messages',
                    AlertDto::success(
                        __(':feature updated successfully', [
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
                        __('Error updating :feature', [
                            'feature' => __('Transaction Type'),
                        ])
                    )
                );
        }
    }
}
