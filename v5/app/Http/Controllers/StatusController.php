<?php

namespace App\Http\Controllers;

use App\Data\AlertDto;
use App\Data\StatusData;
use App\Data\StatusRequestFilters;
use App\Models\Status;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;
use Throwable;

class StatusController
{
    public function index(
        StatusRequestFilters $filters,
    ): Response {
        $query = Status::query();

        $this->applySearch($query, $filters);
        $this->applySorting($query, $filters);

        $statuses = $query
            ->paginate(
                $this->resolvePerPage(
                    $filters->per_page,
                ),
            )
            ->withQueryString();

        $statuses->through(
            fn (Status $status) =>
            StatusData::from($status),
        );

        return Inertia::render(
            'Management/Status/Index',
            [
                'statuses' => $statuses,
                'request' => $filters,
            ],
        );
    }

    public function store(
        StatusData $data,
    ): RedirectResponse {
        if (static::handleCreate($data)) {
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
        }

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

    public function update(
        Status $status,
        StatusData $data,
    ): RedirectResponse {
        if (
            static::handleUpdate(
                $status,
                $data,
            )
        ) {
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
        }

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

    public function delete(
        Status $status,
    ): RedirectResponse {
        if (static::handleDelete($status)) {
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
        }

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

    public function showJson(
        Status $status,
    ): JsonResponse {
        return response()->json(
            StatusData::from($status),
        );
    }

    public function listJson(
        Request $request,
    ): JsonResponse {
        $query = Status::query()
            ->when(
                $request->filled('search'),
                function (
                    Builder $query,
                ) use ($request) {
                    $search = trim(
                        (string) $request->input(
                            'search',
                        ),
                    );

                    $query->whereAny(
                        ['nome'],
                        'ilike',
                        '%' . $search . '%',
                    );
                },
            )
            ->orderBy('nome')
            ->limit(25);

        $items = $query->get();

        $selected =
            $this->getSelectedItem(
                $request,
            );

        if (
            $selected instanceof Status
            && !$items->contains(
                'id',
                $selected->id,
            )
        ) {
            $items->prepend($selected);
        }

        return response()->json(
            StatusData::collect($items)
                ->sortBy('nome')
                ->values(),
        );
    }

    private static function handleCreate(
        StatusData $data,
    ): bool {
        try {
            DB::transaction(
                function () use ($data) {
                    Status::create([
                        'nome' => $data->nome,
                    ]);
                },
            );

            return true;
        } catch (Throwable $throwable) {
            report($throwable);

            return false;
        }
    }

    private static function handleUpdate(
        Status $status,
        StatusData $data,
    ): bool {
        try {
            DB::transaction(
                function () use (
                    $status,
                    $data,
                ) {
                    $status->update([
                        'nome' => $data->nome,
                    ]);
                },
            );

            return true;
        } catch (Throwable $throwable) {
            report($throwable);

            return false;
        }
    }

    private static function handleDelete(
        Status $status,
    ): bool {
        try {
            DB::transaction(
                function () use ($status) {
                    $status->delete();
                },
            );

            return true;
        } catch (Throwable $throwable) {
            report($throwable);

            return false;
        }
    }

    private function applySearch(
        Builder $query,
        StatusRequestFilters $filters,
    ): void {
        if (!$filters->search) {
            return;
        }

        $search = trim(
            $filters->search,
        );

        if ($search === '') {
            return;
        }

        $query->whereAny(
            ['nome'],
            'ilike',
            '%' . $search . '%',
        );
    }

    private function applySorting(
        Builder $query,
        StatusRequestFilters $filters,
    ): void {
        $sort =
            $filters->sort ?: 'nome';

        $direction =
            str_starts_with(
                $sort,
                '-',
            )
                ? 'desc'
                : 'asc';

        $column = ltrim(
            $sort,
            '-',
        );

        $allowedColumns = [
            'id',
            'nome',
        ];

        if (
            !in_array(
                $column,
                $allowedColumns,
                true,
            )
        ) {
            $column = 'nome';
            $direction = 'asc';
        }

        $query->orderBy(
            $column,
            $direction,
        );
    }

    private function resolvePerPage(
        ?string $perPage,
    ): int {
        $value = (int) (
        $perPage ?: 12
        );

        return min(
            max($value, 5),
            100,
        );
    }

    private function getSelectedItem(
        Request $request,
    ): ?Status {
        $selectedKey =
            $request->input(
                'selected_key',
            );

        $selectedValue =
            $request->input(
                'selected_value',
            );

        if (
            !$selectedKey
            || $selectedValue === null
        ) {
            return null;
        }

        if ($request->filled('search')) {
            return null;
        }

        $allowedKeys = [
            'id',
            'nome',
        ];

        if (
            !in_array(
                $selectedKey,
                $allowedKeys,
                true,
            )
        ) {
            return null;
        }

        return Status::query()
            ->where(
                $selectedKey,
                $selectedValue,
            )
            ->first();
    }
}
