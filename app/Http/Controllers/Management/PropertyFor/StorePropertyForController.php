<?php

namespace App\Http\Controllers\Management\PropertyFor;

use App\Data\AlertDto;
use App\Data\TransactionTypeData;
use App\Models\PropertyFor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Throwable;

class StorePropertyForController
{
    public function __invoke(
        TransactionTypeData $data,
    ): RedirectResponse {
        try {
            DB::transaction(
                fn () => PropertyFor::create([
                    'name' => $data->name,
                    'slug' => $data->slug_text,
                ])
            );

            return redirect()
                ->back()
                ->with(
                    'messages',
                    AlertDto::success(
                        __(':feature created successfully', [
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
                        __('Error creating :feature', [
                            'feature' => __('Transaction Type'),
                        ])
                    )
                );
        }
    }
}
