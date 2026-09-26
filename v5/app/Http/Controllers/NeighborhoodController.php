<?php

namespace App\Http\Controllers;

use App\Data\AlertDto;
use App\Data\NeighborhoodData;
use App\Data\NeighborhoodRequestFilters;
use App\Data\SelectQueryData;
use App\Models\Neighborhood;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;
use Throwable;

class NeighborhoodController
{
    /**
     * Display neighbourhood management page.
     */
    public function index(
        NeighborhoodRequestFilters $filters,
    ): Response {
        $query = Neighborhood::query()
            ->with([
                'city.province',
            ]);

        $this->applySearch(
            $query,
            $filters,
        );

        $this->applySorting(
            $query,
            $filters,
        );

        $perPage = $this->resolvePerPage(
            $filters->per_page
        );

        $neighborhoods = $query
            ->paginate($perPage)
            ->withQueryString();

        $neighborhoods->through(
            fn (
                Neighborhood $neighborhood
            ) => NeighborhoodData::fromModel(
                $neighborhood
            )
        );

        return Inertia::render(
            'Management/Neighborhood/Index',
            [
                'neighborhoods' =>
                    $neighborhoods,

                'request' =>
                    $filters,
            ],
        );
    }

    /**
     * Create neighbourhood.
     */
    public function store(
        NeighborhoodData $data,
    ): RedirectResponse {
        if (
            static::handleCreate(
                $data
            )
        ) {
            return redirect()
                ->back()
                ->with(
                    'messages',
                    AlertDto::success(
                        __(
                            ':feature created successfully',
                            [
                                'feature' =>
                                    __('Neighborhood'),
                            ],
                        )
                    )
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
                            'feature' =>
                                __('Neighborhood'),
                        ],
                    )
                )
            );
    }

    /**
     * Update neighbourhood.
     */
    public function update(
        Neighborhood $neighborhood,
        NeighborhoodData $data,
    ): RedirectResponse {
        if (
            static::handleUpdate(
                $neighborhood,
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
                                'feature' =>
                                    __('Neighborhood'),
                            ],
                        )
                    )
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
                            'feature' =>
                                __('Neighborhood'),
                        ],
                    )
                )
            );
    }

    /**
     * Delete neighbourhood.
     */
    public function delete(
        Neighborhood $neighborhood,
    ): RedirectResponse {
        if (
            static::handleDelete(
                $neighborhood
            )
        ) {
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
        }

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

    /**
     * Return one neighbourhood as JSON.
     */
    public function showJson(
        Neighborhood $neighborhood,
    ): JsonResponse {
        $neighborhood->load(
            'city.province'
        );

        return response()->json(
            NeighborhoodData::fromModel(
                $neighborhood
            )
        );
    }

    /**
     * Return neighbourhoods for AsyncSelect.
     */
    public function listJson(
        SelectQueryData $request,
    ): JsonResponse {
        $selectedKey = in_array(
            $request->selectedKey,
            [
                'id',
                'nome',
            ],
            true,
        )
            ? $request->selectedKey
            : 'id';

        $query = Neighborhood::query()
            ->with([
                'city.province',
            ])
            ->when(
                $request->search !== '',
                function (
                    Builder $query
                ) use ($request) {
                    $query->where(
                        function (
                            Builder $query
                        ) use ($request) {
                            $query
                                ->where(
                                    'nome',
                                    'like',
                                    '%' .
                                    $request->search .
                                    '%',
                                )
                                ->orWhereHas(
                                    'city',
                                    function (
                                        Builder $query
                                    ) use ($request) {
                                        $query
                                            ->where(
                                                'nome',
                                                'like',
                                                '%' .
                                                $request->search .
                                                '%',
                                            )
                                            ->orWhereHas(
                                                'province',
                                                fn (
                                                    Builder $query
                                                ) => $query
                                                    ->where(
                                                        'name',
                                                        'like',
                                                        '%' .
                                                        $request->search .
                                                        '%',
                                                    ),
                                            );
                                    },
                                );
                        },
                    );
                },
            )
            ->orderBy('nome')
            ->orderBy('id');

        $paginator = $query->paginate(
            perPage: 25,
            page: max(
                1,
                $request->page,
            ),
        );

        $items =
            $paginator->getCollection();

        if (
            $request->page === 1
            && !empty(
            $request->selectedValues
            )
        ) {
            $selectedItems =
                Neighborhood::query()
                    ->with([
                        'city.province',
                    ])
                    ->whereIn(
                        $selectedKey,
                        $request->selectedValues,
                    )
                    ->get();

            $items = $selectedItems
                ->concat($items)
                ->unique(
                    fn (
                        Neighborhood $neighborhood
                    ) =>
                    $neighborhood->getAttribute(
                        $selectedKey
                    ),
                )
                ->values();
        }

        $paginator->setCollection(
            $items
                ->map(
                    fn (
                        Neighborhood $neighborhood
                    ) =>
                    NeighborhoodData::fromModel(
                        $neighborhood
                    ),
                )
                ->values(),
        );

        return response()->json(
            $paginator
        );
    }

    /**
     * Handle creation.
     */
    private static function handleCreate(
        NeighborhoodData $data,
    ): bool {
        try {
            DB::transaction(
                function () use ($data) {
                    Neighborhood::create([
                        'nome' =>
                            $data->nome,

                        'cidade_id' =>
                            $data->city_id,
                    ]);
                },
            );

            return true;
        } catch (
        Throwable $throwable
        ) {
            report($throwable);

            return false;
        }
    }

    /**
     * Handle update.
     */
    private static function handleUpdate(
        Neighborhood $neighborhood,
        NeighborhoodData $data,
    ): bool {
        try {
            DB::transaction(
                function () use (
                    $neighborhood,
                    $data,
                ) {
                    $neighborhood->update([
                        'nome' =>
                            $data->nome,

                        'cidade_id' =>
                            $data->city_id,
                    ]);
                },
            );

            return true;
        } catch (
        Throwable $throwable
        ) {
            report($throwable);

            return false;
        }
    }

    /**
     * Handle deletion.
     */
    private static function handleDelete(
        Neighborhood $neighborhood,
    ): bool {
        try {
            DB::transaction(
                function () use (
                    $neighborhood
                ) {
                    $neighborhood->delete();
                },
            );

            return true;
        } catch (
        Throwable $throwable
        ) {
            report($throwable);

            return false;
        }
    }

    /**
     * Apply search.
     */
    private function applySearch(
        Builder $query,
        NeighborhoodRequestFilters $filters,
    ): void {
        if (!$filters->search) {
            return;
        }

        $search = trim(
            $filters->search
        );

        if ($search === '') {
            return;
        }

        $query->where(
            function (
                Builder $query
            ) use ($search) {
                $query
                    ->where(
                        'nome',
                        'like',
                        '%' . $search . '%',
                    )
                    ->orWhereHas(
                        'city',
                        function (
                            Builder $query
                        ) use ($search) {
                            $query
                                ->where(
                                    'nome',
                                    'like',
                                    '%' .
                                    $search .
                                    '%',
                                )
                                ->orWhereHas(
                                    'province',
                                    fn (
                                        Builder $query
                                    ) => $query
                                        ->where(
                                            'name',
                                            'like',
                                            '%' .
                                            $search .
                                            '%',
                                        ),
                                );
                        },
                    );
            },
        );
    }

    /**
     * Apply safe sorting.
     */
    private function applySorting(
        Builder $query,
        NeighborhoodRequestFilters $filters,
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
            'cidade_id',
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

    /**
     * Keep pagination under control.
     */
    private function resolvePerPage(
        ?string $perPage,
    ): int {
        $value = (int) (
        $perPage ?: 12
        );

        return min(
            max(
                $value,
                5,
            ),
            100,
        );
    }
}
