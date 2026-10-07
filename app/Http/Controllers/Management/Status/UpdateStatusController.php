<?php

namespace App\Http\Controllers\Management\Status;

use App\Data\AlertDto;
use App\Data\StatusData;
use App\Models\Status;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Throwable;

class UpdateStatusController
{
    public function __invoke(
        Status $status,
        StatusData $data,
    ): RedirectResponse {
        try {
            DB::transaction(
                fn () => $status->update([
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
                            'Error updating :feature',
                            [
                                'feature' => __('Status'),
                            ],
                        ),
                    ),
                );
        }
    }
}
