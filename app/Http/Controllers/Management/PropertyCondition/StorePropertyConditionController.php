<?php

namespace App\Http\Controllers\Management\PropertyCondition;

use App\Data\AlertDto;
use App\Data\PropertyConditionData;
use App\Models\PropertyCondition;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Throwable;

class StorePropertyConditionController
{
    public function __invoke(
        PropertyConditionData $data,
    ): RedirectResponse {
        try {
            DB::transaction(
                fn () => PropertyCondition::create([
                    'name' => $data->name,
                ])
            );

            return redirect()
                ->back()
                ->with(
                    'messages',
                    AlertDto::success(
                        __(
                            ':feature created successfully',
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
                            'Error creating :feature',
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
