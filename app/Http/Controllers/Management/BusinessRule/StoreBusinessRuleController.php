<?php

namespace App\Http\Controllers\Management\BusinessRule;

use App\Data\AlertDto;
use App\Data\BusinessRuleData;
use App\Models\BusinessRule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Throwable;

class StoreBusinessRuleController
{
    public function __invoke(
        BusinessRuleData $data,
    ): RedirectResponse {
        try {
            DB::transaction(
                static fn () => BusinessRule::create([
                    'name' => $data->name,
                ])
            );

            return redirect()
                ->back()
                ->with(
                    'messages',
                    AlertDto::success(
                        __(':feature created successfully', [
                            'feature' => __('Business Rule'),
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
                            'feature' => __('Business Rule'),
                        ])
                    )
                );
        }
    }
}
