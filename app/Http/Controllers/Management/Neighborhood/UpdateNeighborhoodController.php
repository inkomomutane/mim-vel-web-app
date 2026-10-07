<?php

namespace App\Http\Controllers\Management\Neighborhood;

use App\Data\AlertDto;
use App\Data\NeighborhoodData;
use App\Models\Neighborhood;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Throwable;

class UpdateNeighborhoodController
{
    public function __invoke(
        Neighborhood $neighborhood,
        NeighborhoodData $data,
    ): RedirectResponse {
        try {
            DB::transaction(
                fn () => $neighborhood->update([
                    'name' => $data->name,
                    'city_id' => $data->city_id,
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
                                    __('Neighborhood'),
                            ],
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
                                    __('Neighborhood'),
                            ],
                        )
                    )
                );
        }
    }
}
