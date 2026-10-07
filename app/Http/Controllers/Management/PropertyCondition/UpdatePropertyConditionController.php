<?php

namespace App\Http\Controllers\Management\PropertyCondition;

use App\Data\AlertDto;
use App\Data\PropertyConditionData;
use App\Models\PropertyCondition;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Throwable;

class UpdatePropertyConditionController
{
    public function __invoke(
        PropertyCondition $propertyCondition,
        PropertyConditionData $data,
    ): RedirectResponse {
        try {
            DB::transaction(
                fn () => $propertyCondition->update([
                    'name' => $data->name,
                ])
            );

            return redirect()
                ->back()
                ->with(
                    'messages',
                    AlertDto::success(
                        __(
                            ':feature updated successfully',
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
                            'Error updating :feature',
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
