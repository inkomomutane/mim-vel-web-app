<?php

namespace App\Http\Controllers\Management\Status;

use App\Data\AlertDto;
use App\Data\StatusData;
use App\Models\Status;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Throwable;

class StoreStatusController
{
    public function __invoke(
        StatusData $data,
    ): RedirectResponse {
        try {
            DB::transaction(
                fn () => Status::create([
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
                            'Error creating :feature',
                            [
                                'feature' => __('Status'),
                            ],
                        ),
                    ),
                );
        }
    }
}
