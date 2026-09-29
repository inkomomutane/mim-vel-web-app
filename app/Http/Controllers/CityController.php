<?php

namespace App\Http\Controllers;

use App\Data\AlertDto;
use App\Data\CityData;
use App\Data\CityRequestFilters;
use App\Data\SelectQueryData;
use App\Models\City;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;
use Throwable;

class CityController
{
    /**
     * Display city management page.
     */
    public function index(
        CityRequestFilters $filters,
    ): Response {
        $query = City::query()
            ->with('province');

        $this->applySearch(
            $query,
            $filters
        );

        $this->applySorting(
            $query,
            $filters
        );

        $perPage = $this->resolvePerPage(
            $filters->per_page
        );

        $cities = $query
            ->paginate($perPage)
            ->withQueryString();

        $cities->through(
            fn (City $city) => $this->toData($city)
        );

        return Inertia::render(
            'Management/City/Index',
            [
                'cities' => $cities,
                'request' => $filters,
            ],
        );
    }

    /**
     * Create city.
     */
    public function store(
        CityData $data,
    ): RedirectResponse {
        if (static::handleCreate($data)) {
            return redirect()
                ->back()
                ->with(
                    'messages',
                    AlertDto::success(
                        __(':feature created successfully', [
                            'feature' => __('City'),
                        ])
                    )
                );
        }

        return redirect()
            ->back()
            ->with(
                'messages',
                AlertDto::error(
                    __('Error creating :feature', [
                        'feature' => __('City'),
                    ])
                )
            );
    }

    /**
     * Update city.
     */
    public function update(
        City $city,
        CityData $data,
    ): RedirectResponse {
        if (
            static::handleUpdate(
                $city,
                $data
            )
        ) {
            return redirect()
                ->back()
                ->with(
                    'messages',
                    AlertDto::success(
                        __(':feature updated successfully', [
                            'feature' => __('City'),
                        ])
                    )
                );
        }

        return redirect()
            ->back()
            ->with(
                'messages',
                AlertDto::error(
                    __('Error updating :feature', [
                        'feature' => __('City'),
                    ])
                )
            );
    }

    /**
     * Delete city.
     */
    public function delete(
        City $city,
    ): RedirectResponse {
        if (
            static::handleDelete($city)
        ) {
            return redirect()
                ->back()
                ->with(
                    'messages',
                    AlertDto::success(
                        __(':feature processed successfully', [
                            'feature' => __('City'),
                        ])
                    )
                );
        }

        return redirect()
            ->back()
            ->with(
                'messages',
                AlertDto::error(
                    __('Error processing :feature', [
                        'feature' => __('City'),
                    ])
                )
            );
    }

    /**
     * Return one city as JSON.
     */
    public function showJson(
        City $city,
    ): JsonResponse {
        $city->load('province');

        return response()->json(
            $this->toData($city)
        );
    }

    public function listJson(
        SelectQueryData $request,
    ): JsonResponse {
        $selectedKey = in_array(
            $request->selectedKey,
            ['id', 'nome', 'province_id'],
            true
        )
            ? $request->selectedKey
            : 'id';

        $query = City::query()
            ->with('province')
            ->when(
                $request->search !== '',
                function (Builder $query) use ($request) {
                    $query->where(
                        function (Builder $query) use ($request) {
                            $query
                                ->where(
                                    'nome',
                                    'like',
                                    '%' . $request->search . '%'
                                )
                                ->orWhereHas(
                                    'province',
                                    fn (Builder $query) =>
                                    $query->where(
                                        'name',
                                        'like',
                                        '%' . $request->search . '%'
                                    )
                                );
                        }
                    );
                }
            )
            ->orderBy('nome')
            ->orderBy('id');

        $paginator = $query->paginate(
            perPage: 25,
            page: max(1, $request->page),
        );

        $items = $paginator->getCollection();

        if (
            $request->page === 1 &&
            !empty($request->selectedValues)
        ) {
            $selectedItems = City::query()
                ->with('province')
                ->whereIn(
                    $selectedKey,
                    $request->selectedValues
                )
                ->get();

            $items = $selectedItems
                ->concat($items)
                ->unique(
                    fn (City $city) =>
                    $city->getAttribute($selectedKey)
                )
                ->values();
        }

        $paginator->setCollection(
            $items
                ->map(
                    fn (City $city) =>
                    $this->toData($city)
                )
                ->values()
        );

        return response()->json($paginator);
    }

    /**
     * Convert City model to CityData.
     */
    private function toData(
        City $city,
    ): CityData {
        return CityData::from([
            'id' => $city->id,
            'nome' => $city->nome,
            'province_id' => $city->province_id,
            'province_name' => $city->province?->name,
        ]);
    }

    /**
     * Handle creation.
     */
    private static function handleCreate(
        CityData $data,
    ): bool {
        try {
            DB::transaction(function () use ($data) {
                City::create([
                    'nome' => $data->nome,
                    'province_id' => $data->province_id,
                ]);
            });

            return true;
        } catch (Throwable $throwable) {
            report($throwable);

            return false;
        }
    }

    /**
     * Handle update.
     */
    private static function handleUpdate(
        City $city,
        CityData $data,
    ): bool {
        try {
            DB::transaction(
                function () use (
                    $city,
                    $data
                ) {
                    $city->update([
                        'nome' => $data->nome,
                        'province_id' => $data->province_id,
                    ]);
                }
            );

            return true;
        } catch (Throwable $throwable) {
            report($throwable);

            return false;
        }
    }

    /**
     * Handle deletion.
     */
    private static function handleDelete(
        City $city,
    ): bool {
        try {
            DB::transaction(function () use ($city) {
                $city->delete();
            });

            return true;
        } catch (Throwable $throwable) {
            report($throwable);

            return false;
        }
    }

    /**
     * Apply search filters.
     */
    private function applySearch(
        Builder $query,
        CityRequestFilters $filters,
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
            function (Builder $query) use ($search) {
                $query
                    ->where(
                        'nome',
                        'like',
                        '%' . $search . '%'
                    )
                    ->orWhereHas(
                        'province',
                        function (Builder $query) use ($search) {
                            $query->where(
                                'name',
                                'like',
                                '%' . $search . '%'
                            );
                        }
                    );
            }
        );
    }

    /**
     * Apply safe sorting.
     */
    private function applySorting(
        Builder $query,
        CityRequestFilters $filters,
    ): void {
        $sort = $filters->sort ?: 'nome';

        $direction = str_starts_with(
            $sort,
            '-'
        )
            ? 'desc'
            : 'asc';

        $column = ltrim(
            $sort,
            '-'
        );

        $allowedColumns = [
            'id',
            'nome',
            'province_id',
        ];

        if (
            !in_array(
                $column,
                $allowedColumns,
                true
            )
        ) {
            $column = 'nome';
            $direction = 'asc';
        }

        $query->orderBy(
            $column,
            $direction
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
            max($value, 5),
            100
        );
    }

    /**
     * Retrieve selected city for AsyncSelect hydration.
     */
    private function getSelectedItem(
        Request $request,
    ): ?City {
        $selectedKey = $request->input(
            'selected_key'
        );

        $selectedValue = $request->input(
            'selected_value'
        );

        if (
            !$selectedKey ||
            $selectedValue === null
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
                true
            )
        ) {
            return null;
        }

        return City::query()
            ->where(
                $selectedKey,
                $selectedValue
            )
            ->first();
    }
}
