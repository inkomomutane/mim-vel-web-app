<?php

namespace App\Http\Controllers\Management\IntermediationRule;

use App\Data\AlertDto;
use App\Data\IntermediationRuleData;
use App\Models\IntermediationRule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Throwable;

class StoreIntermediationRuleController
{
    public function __invoke(
        IntermediationRuleData $data,
    ): RedirectResponse {
        try {
            DB::transaction(
                fn () => IntermediationRule::create([
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
                        __(':feature created successfully', [
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
                        __('Error creating :feature', [
                            'feature' => __('Intermediation Rule'),
                        ])
                    )
                );
        }
    }
}
