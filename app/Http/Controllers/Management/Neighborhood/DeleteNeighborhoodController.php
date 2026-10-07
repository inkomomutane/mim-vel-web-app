<?php

namespace App\Http\Controllers\Management\Neighborhood;

use App\Data\AlertDto;
use App\Models\Neighborhood;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Throwable;

class DeleteNeighborhoodController
{
    public function __invoke(
        Neighborhood $neighborhood,
    ): RedirectResponse {
        try {
            DB::transaction(
                fn () => $neighborhood->delete()
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
                            'Error processing :feature',
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
