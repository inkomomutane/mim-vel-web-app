<?php

namespace App\Http\Controllers\Management\IntermediationRule;

use App\Data\AlertDto;
use App\Models\IntermediationRule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Throwable;

class DeleteIntermediationRuleController
{
    public function __invoke(
        IntermediationRule $intermediationRule,
    ): RedirectResponse {
        try {
            DB::transaction(
                fn () => $intermediationRule->delete()
            );

            return redirect()
                ->back()
                ->with(
                    'messages',
                    AlertDto::success(
                        __(':feature processed successfully', [
                            'feature' => __('Intermediation Rule'),
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
                            'feature' => __('Intermediation Rule'),
                        ])
                    )
                );
        }
    }
}
