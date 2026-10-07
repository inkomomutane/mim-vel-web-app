<?php

namespace App\Http\Controllers\Management\BusinessRule;

use App\Data\AlertDto;
use App\Data\BusinessRuleData;
use App\Models\BusinessRule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Throwable;

class UpdateBusinessRuleController
{
    public function __invoke(
        BusinessRule $businessRule,
        BusinessRuleData $data,
    ): RedirectResponse {
        try {
            DB::transaction(
                static fn () => $businessRule->update([
                    'name' => $data->name,
                ])
            );

            return redirect()
                ->back()
                ->with(
                    'messages',
                    AlertDto::success(
                        __(':feature updated successfully', [
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
                        __('Error updating :feature', [
                            'feature' => __('Business Rule'),
                        ])
                    )
                );
        }
    }
}
