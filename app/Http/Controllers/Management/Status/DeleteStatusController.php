<?php

namespace App\Http\Controllers\Management\Status;

use App\Data\AlertDto;
use App\Models\Status;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Throwable;

class DeleteStatusController
{
    public function __invoke(
        Status $status,
    ): RedirectResponse {
        try {
            DB::transaction(
                fn () => $status->delete()
            );

            return redirect()
                ->back()
                ->with(
                    'messages',
                    AlertDto::success(
                        __(
                            ':feature processed successfully',
                            [
                                'feature' => __('Status'),
                            ],
                        ),
                    ),
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
                                'feature' => __('Status'),
                            ],
                        ),
                    ),
                );
        }
    }
}
