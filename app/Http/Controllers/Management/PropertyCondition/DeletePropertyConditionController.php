<?php

namespace App\Http\Controllers\Management\PropertyCondition;

use App\Data\AlertDto;
use App\Models\PropertyCondition;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Throwable;

class DeletePropertyConditionController
{
    public function __invoke(
        PropertyCondition $propertyCondition,
    ): RedirectResponse {
        try {
            DB::transaction(
                fn () => $propertyCondition->delete()
            );

            return redirect()
                ->back()
                ->with(
                    'messages',
                    AlertDto::success(
                        __(
                            ':feature processed successfully',
                            [
                                'feature' =>
                                    __('Property Condition'),
                            ]
                        )
                    )
                );
        } catch (Throwable $throwable) {
            report($throwable);

            return redirect()
                ->back()
                ->with(
                    'messages',
                    AlertDto::error(
                        __(
                            'Error processing :feature',
                            [
                                'feature' =>
                                    __('Property Condition'),
                            ]
                        )
                    )
                );
        }
    }
}
