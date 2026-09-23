<?php

namespace App\Http\Controllers;

use App\Data\AlertDto;
use App\Data\PropertyConditionData;
use App\Data\PropertyConditionRequestFilters;
use App\Models\PropertyCondition;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;
use Throwable;

class PropertyConditionController
{
    /**
     * Display property conditions.
     */
    public function index(
        PropertyConditionRequestFilters $filters,
    ): Response {
        $query = PropertyCondition::query();

        $this->applySearch($query, $filters);
        $this->applySorting($query, $filters);

        $propertyConditions = $query
            ->paginate(
                $this->resolvePerPage($filters->per_page)
            )
            ->withQueryString();

        $propertyConditions->through(
            fn (PropertyCondition $propertyCondition) => PropertyConditionData::from(
                $propertyCondition
            )
        );

        return Inertia::render(
            'Management/PropertyCondition/Index',
            [
                'propertyConditions' => $propertyConditions,
                'request' => $filters,
            ]
        );
    }

    /**
     * Create property condition.
     */
    public function store(
        PropertyConditionData $data,
    ): RedirectResponse {
        if (static::handleCreate($data)) {
            return redirect()
                ->back()
                ->with(
                    'messages',
                    AlertDto::success(__(':feature created successfully', [
                        'feature' => __('Property Condition'),
                    ]))
                );
        }

        return redirect()
            ->back()
            ->with(
                'messages',
                AlertDto::error(__('Error creating :feature', [
                    'feature' => __('Property Condition'),
                ]))
            );
    }

    /**
     * Update property condition.
     */
    public function update(
        PropertyCondition $propertyCondition,
        PropertyConditionData $data,
    ): RedirectResponse {
        if (
            static::handleUpdate(
                $propertyCondition,
                $data
            )
        ) {
            return redirect()
                ->back()
                ->with(
                    'messages',
                    AlertDto::success(__(':feature updated successfully', [
                        'feature' => __('Property Condition'),
                    ]))
                );
        }

        return redirect()
            ->back()
            ->with(
                'messages',
                AlertDto::error(__('Error updating :feature', [
                    'feature' => __('Property Condition'),
                ]))
            );
    }

    /**
     * Delete property condition.
     */
    public function delete(
        PropertyCondition $propertyCondition,
    ): RedirectResponse {
        if (static::handleDelete($propertyCondition)) {
            return redirect()
                ->back()
                ->with(
                    'messages',
                    AlertDto::success(__(':feature processed successfully', [
                        'feature' => __('Property Condition'),
                    ]))
                );
        }

        return redirect()
            ->back()
            ->with(
                'messages',
                AlertDto::error(__('Error processing :feature', [
                    'feature' => __('Property Condition'),
                ]))
            );
    }

    /**
     * Return one property condition.
     */
    public function showJson(
        PropertyCondition $propertyCondition,
    ): JsonResponse {
        return response()->json(
            PropertyConditionData::from(
                $propertyCondition
            )
        );
    }

    /**
     * Return property conditions for selects.
     */
    public function listJson(
        Request $request,
    ): JsonResponse {
        $query = PropertyCondition::query()
            ->when(
                $request->filled('search'),
                function (Builder $query) use ($request) {
                    $search = trim(
                        (string) $request->input('search')
                    );

                    $query->whereAny(
                        ['nome'],
                        'ilike',
                        '%' . $search . '%'
                    );
                }
            )
            ->orderBy('nome')
            ->limit(25);

        $items = $query->get();

        $selected = $this->getSelectedItem(
            $request
        );

        if (
            $selected instanceof PropertyCondition
            && !$items->contains('id', $selected->id)
        ) {
            $items->prepend($selected);
        }

        return response()->json(
            PropertyConditionData::collect($items)
                ->sortBy('nome')
                ->values()
        );
    }

    /**
     * Handle creation.
     */
    private static function handleCreate(
        PropertyConditionData $data,
    ): bool {
        try {
            DB::transaction(function () use ($data) {
                PropertyCondition::create([
                    'nome' => $data->nome,
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
        PropertyCondition $propertyCondition,
        PropertyConditionData $data,
    ): bool {
        try {
            DB::transaction(function () use (
                $propertyCondition,
                $data
            ) {
                $propertyCondition->update([
                    'nome' => $data->nome,
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
        PropertyCondition $propertyCondition,
    ): bool {
        try {
            DB::transaction(function () use (
                $propertyCondition
            ) {
                $propertyCondition->delete();
            });

            return true;
        } catch (Throwable $throwable) {
            report($throwable);

            return false;
        }
    }

    /**
     * Apply search.
     */
    private function applySearch(
        Builder $query,
        PropertyConditionRequestFilters $filters,
    ): void {
        if (!$filters->search) {
            return;
        }

        $search = trim($filters->search);

        if ($search === '') {
            return;
        }

        $query->whereAny(
            ['nome'],
            'ilike',
            '%' . $search . '%'
        );
    }

    /**
     * Apply sorting.
     */
    private function applySorting(
        Builder $query,
        PropertyConditionRequestFilters $filters,
    ): void {
        $sort = $filters->sort ?: 'nome';

        $direction = str_starts_with(
            $sort,
            '-'
        )
            ? 'desc'
            : 'asc';

        $column = ltrim($sort, '-');

        $allowedColumns = [
            'id',
            'nome',
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
     * Resolve pagination size.
     */
    private function resolvePerPage(
        ?string $perPage,
    ): int {
        $value = (int) ($perPage ?: 12);

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
    ): ?PropertyCondition {
        $selectedKey = $request->input(
            'selected_key'
        );

        $selectedValue = $request->input(
            'selected_value'
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
                true
            )
        ) {
            return null;
        }

        return PropertyCondition::query()
            ->where(
                $selectedKey,
                $selectedValue
            )
            ->first();
    }
}
