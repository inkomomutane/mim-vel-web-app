<?php

namespace App\Http\Controllers\Management\IntermediationRule;

use App\Data\AlertDto;
use App\Data\IntermediationRuleData;
use App\Models\IntermediationRule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Throwable;

class UpdateIntermediationRuleController
{
    public function __invoke(
        IntermediationRule $intermediationRule,
        IntermediationRuleData $data,
    ): RedirectResponse {
        try {
            DB::transaction(
                fn () => $intermediationRule->update([
                    'name' => $data->name,
                    'code' => $data->code,
                    'percentage' => $data->percentage,
                ])
            );

            return redirect()
                ->back()
                ->with(
                    'messages',
                    AlertDto::success(
                        __(':feature updated successfully', [
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
                        __('Error updating :feature', [
                            'feature' => __('Intermediation Rule'),
                        ])
                    )
                );
        }
    }
}
