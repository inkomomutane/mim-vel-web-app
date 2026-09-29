<?php

namespace App\Http\Controllers;

use App\Data\AlertDto;
use App\Data\BusinessRuleData;
use App\Data\BusinessRuleRequestFilters;
use App\Data\SelectQueryData;
use App\Models\BusinessRule;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;
use Throwable;

class BusinessRuleController
{
    /**
     * Display the business rule management page.
     */
    public function index(
        BusinessRuleRequestFilters $filters,
    ): Response {
        $query = BusinessRule::query();

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

        $businessRules = $query
            ->paginate($perPage)
            ->withQueryString();

        $businessRules->through(
            fn (BusinessRule $businessRule) =>
            BusinessRuleData::from($businessRule)
        );

        return Inertia::render(
            'Management/BusinessRule/Index',
            [
                'businessRules' => $businessRules,
                'request' => $filters,
            ],
        );
    }

    /**
     * Create business rule.
     */
    public function store(
        BusinessRuleData $data,
    ): RedirectResponse {
        if (static::handleCreate($data)) {
            return redirect()
                ->back()
                ->with(
                    'messages',
                    AlertDto::success(
                        __(':feature created successfully', [
                            'feature' => __('Business Rule'),
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
                        'feature' => __('Business Rule'),
                    ])
                )
            );
    }

    /**
     * Update business rule.
     */
    public function update(
        BusinessRule $businessRule,
        BusinessRuleData $data,
    ): RedirectResponse {
        if (
            static::handleUpdate(
                $businessRule,
                $data
            )
        ) {
            return redirect()
                ->back()
                ->with(
                    'messages',
                    AlertDto::success(
                        __(':feature updated successfully', [
                            'feature' => __('Business Rule'),
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
                        'feature' => __('Business Rule'),
                    ])
                )
            );
    }

    /**
     * Delete business rule.
     */
    public function delete(
        BusinessRule $businessRule,
    ): RedirectResponse {
        if (
            static::handleDelete(
                $businessRule
            )
        ) {
            return redirect()
                ->back()
                ->with(
                    'messages',
                    AlertDto::success(
                        __(':feature processed successfully', [
                            'feature' => __('Business Rule'),
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
                        'feature' => __('Business Rule'),
                    ])
                )
            );
    }

    /**
     * Return one business rule as JSON.
     */
    public function showJson(
        BusinessRule $businessRule,
    ): JsonResponse {
        return response()->json(
            BusinessRuleData::from(
                $businessRule
            )
        );
    }

    public function listJson(
        SelectQueryData $request,
    ): JsonResponse {
        $selectedKey = in_array(
            $request->selectedKey,
            ['id', 'name'],
            true
        )
            ? $request->selectedKey
            : 'id';

        $query = BusinessRule::query()
            ->when(
                $request->search !== '',
                fn (Builder $query) => $query->whereAny(
                    ['name'],
                    'like',
                    '%' . $request->search . '%'
                )
            )
            ->orderBy('name')
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
            $selectedItems = BusinessRule::query()
                ->whereIn(
                    $selectedKey,
                    $request->selectedValues
                )
                ->get();

            $items = $selectedItems
                ->concat($items)
                ->unique(
                    fn (BusinessRule $businessRule) =>
                    $businessRule->getAttribute($selectedKey)
                )
                ->values();
        }

        $paginator->setCollection(
            $items
                ->map(
                    fn (BusinessRule $businessRule) =>
                    BusinessRuleData::from($businessRule)
                )
                ->values()
        );

        return response()->json($paginator);
    }
    /**
     * Handle creation.
     */
    private static function handleCreate(
        BusinessRuleData $data,
    ): bool {
        try {
            DB::transaction(
                function () use ($data) {
                    BusinessRule::create([
                        'name' => $data->name,
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
     * Handle update.
     */
    private static function handleUpdate(
        BusinessRule $businessRule,
        BusinessRuleData $data,
    ): bool {
        try {
            DB::transaction(
                function () use (
                    $businessRule,
                    $data
                ) {
                    $businessRule->update([
                        'name' => $data->name,
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
        BusinessRule $businessRule,
    ): bool {
        try {
            DB::transaction(
                function () use (
                    $businessRule
                ) {
                    $businessRule->delete();
                }
            );

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
        BusinessRuleRequestFilters $filters,
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
        BusinessRuleRequestFilters $filters,
    ): void {
        $sort = $filters->sort ?: 'name';

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
            'name',
        ];

        if (
            !in_array(
                $column,
                $allowedColumns,
                true
            )
        ) {
            $column = 'name';
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
     * Retrieve selected item for AsyncSelect hydration.
     */
    private function getSelectedItem(
        Request $request,
    ): ?BusinessRule {
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
            'name',
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

        return BusinessRule::query()
            ->where(
                $selectedKey,
                $selectedValue
            )
            ->first();
    }
}
