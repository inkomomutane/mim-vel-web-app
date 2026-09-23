<?php

namespace App\Http\Controllers;

use App\Data\AlertDto;
use App\Data\ProvinceData;
use App\Data\ProvinceRequestFilters;
use App\Models\Province;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;
use Throwable;

class ProvinceController
{
    /**
     * Display the province management page.
     */
    public function index(ProvinceRequestFilters $filters): Response
    {
        $query = Province::query();

        $this->applySearch($query, $filters);
        $this->applySorting($query, $filters);

        $perPage = $this->resolvePerPage($filters->per_page);

        $provinces = $query
            ->paginate($perPage)
            ->withQueryString();

        $provinces->through(
            fn (Province $province) => ProvinceData::from($province)
        );

        return Inertia::render('Management/Province/Index', [
            'provinces' => $provinces,
            'request' => $filters,
        ]);
    }

    /**
     * Create province.
     */
    public function store(ProvinceData $data): RedirectResponse
    {
        if (static::handleCreate($data)) {
            return redirect()
                ->back()
                ->with(
                    'messages',
                    AlertDto::success(__(':feature created successfully', [
                        'feature' => __('Province'),
                    ]))
                );
        }

        return redirect()
            ->back()
            ->with(
                'messages',
                AlertDto::error(__('Error creating :feature', [
                    'feature' => __('Province'),
                ]))
            );
    }

    /**
     * Update province.
     */
    public function update(
        Province $province,
        ProvinceData $data,
    ): RedirectResponse {
        if (static::handleUpdate($province, $data)) {
            return redirect()
                ->back()
                ->with(
                    'messages',
                    AlertDto::success(__(':feature updated successfully', [
                        'feature' => __('Province'),
                    ]))
                );
        }

        return redirect()
            ->back()
            ->with(
                'messages',
                AlertDto::error(__('Error updating :feature', [
                    'feature' => __('Province'),
                ]))
            );
    }

    /**
     * Delete province.
     */
    public function delete(Province $province): RedirectResponse
    {
        if (static::handleDelete($province)) {
            return redirect()
                ->back()
                ->with(
                    'messages',
                    AlertDto::success(__(':feature processed successfully', [
                        'feature' => __('Province'),
                    ]))
                );
        }

        return redirect()
            ->back()
            ->with(
                'messages',
                AlertDto::error(__('Error processing :feature', [
                    'feature' => __('Province'),
                ]))
            );
    }

    /**
     * Return one province as JSON.
     */
    public function showJson(Province $province): JsonResponse
    {
        return response()->json(
            ProvinceData::from($province)
        );
    }

    /**
     * Return provinces for select components.
     */
    public function listJson(Request $request): JsonResponse
    {
        $query = Province::query()
            ->when(
                $request->filled('search'),
                function (Builder $query) use ($request) {
                    $search = trim((string) $request->input('search'));

                    $query->whereAny(
                        ['name'],
                        'like',
                        '%' . $search . '%'
                    );
                }
            )
            ->orderBy('name')
            ->limit(25);

        $items = $query->get();

        $selected = $this->getSelectedItem($request);

        if ($selected instanceof Province) {
            if (!$items->contains('id', $selected->id)) {
                $items->prepend($selected);
            }
        }

        return response()->json(
            ProvinceData::collect($items)
                ->sortBy('name')
                ->values()
        );
    }

    /**
     * Handle creation.
     */
    private static function handleCreate(
        ProvinceData $data,
    ): bool {
        try {
            DB::transaction(function () use ($data) {
                Province::create([
                    'name' => $data->name,
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
        Province $province,
        ProvinceData $data,
    ): bool {
        try {
            DB::transaction(function () use ($province, $data) {
                $province->update([
                    'name' => $data->name,
                ]);
            });

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
        Province $province,
    ): bool {
        try {
            DB::transaction(function () use ($province) {
                $province->delete();
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
        ProvinceRequestFilters $filters,
    ): void {
        if (!$filters->search) {
            return;
        }

        $search = trim($filters->search);

        if ($search === '') {
            return;
        }

        $query->whereAny(
            ['name'],
            'like',
            '%' . $search . '%'
        );
    }

    /**
     * Apply safe sorting.
     */
    private function applySorting(
        Builder $query,
        ProvinceRequestFilters $filters,
    ): void {
        $sort = $filters->sort ?: 'name';

        $direction = str_starts_with($sort, '-')
            ? 'desc'
            : 'asc';

        $column = ltrim($sort, '-');

        $allowedColumns = [
            'id',
            'name',
        ];

        if (!in_array($column, $allowedColumns, true)) {
            $column = 'name';
            $direction = 'asc';
        }

        $query->orderBy($column, $direction);
    }

    /**
     * Keep pagination under control.
     */
    private function resolvePerPage(?string $perPage): int
    {
        $value = (int) ($perPage ?: 12);

        return min(
            max($value, 5),
            100
        );
    }

    /**
     * Retrieve the currently selected item for AsyncSelect hydration.
     */
    private function getSelectedItem(Request $request): ?Province
    {
        $selectedKey = $request->input('selected_key');
        $selectedValue = $request->input('selected_value');

        if (!$selectedKey || $selectedValue === null) {
            return null;
        }

        if ($request->filled('search')) {
            return null;
        }

        $allowedKeys = [
            'id',
            'name',
        ];

        if (!in_array($selectedKey, $allowedKeys, true)) {
            return null;
        }

        return Province::query()
            ->where($selectedKey, $selectedValue)
            ->first();
    }
}
