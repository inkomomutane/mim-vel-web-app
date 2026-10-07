<?php

namespace App\Http\Controllers\Management\BusinessRule;

use App\Data\AlertDto;
use App\Models\BusinessRule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Throwable;

class DeleteBusinessRuleController
{
    public function __invoke(
        BusinessRule $businessRule,
    ): RedirectResponse {
        try {
            DB::transaction(
                fn () => $businessRule->delete()
            );

            return redirect()
                ->back()
                ->with(
                    'messages',
                    AlertDto::success(
                        __(':feature processed successfully', [
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
                        __('Error processing :feature', [
                            'feature' => __('Business Rule'),
                        ])
                    )
                );
        }
    }
}
