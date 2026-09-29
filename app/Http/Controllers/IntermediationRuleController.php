<?php

namespace App\Http\Controllers;

use App\Data\AlertDto;
use App\Data\IntermediationRuleData;
use App\Data\IntermediationRuleRequestFilters;
use App\Data\SelectQueryData;
use App\Models\IntermediationRule;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;
use Throwable;

class IntermediationRuleController
{
    /**
     * Display intermediation rule management page.
     */
    public function index(
        IntermediationRuleRequestFilters $filters,
    ): Response {
        $query = IntermediationRule::query();

        $this->applySearch($query, $filters);
        $this->applySorting($query, $filters);

        $perPage = $this->resolvePerPage(
            $filters->per_page
        );

        $intermediationRules = $query
            ->paginate($perPage)
            ->withQueryString();

        $intermediationRules->through(
            fn (IntermediationRule $rule) =>
            IntermediationRuleData::from($rule)
        );

        return Inertia::render(
            'Management/IntermediationRule/Index',
            [
                'intermediationRules' => $intermediationRules,
                'request' => $filters,
            ],
        );
    }

    /**
     * Create intermediation rule.
     */
    public function store(
        IntermediationRuleData $data,
    ): RedirectResponse {
        if (static::handleCreate($data)) {
            return redirect()
                ->back()
                ->with(
                    'messages',
                    AlertDto::success(
                        __(':feature created successfully', [
                            'feature' => __('Intermediation Rule'),
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
                        'feature' => __('Intermediation Rule'),
                    ])
                )
            );
    }

    /**
     * Update intermediation rule.
     */
    public function update(
        IntermediationRule $intermediationRule,
        IntermediationRuleData $data,
    ): RedirectResponse {
        if (
            static::handleUpdate(
                $intermediationRule,
                $data,
            )
        ) {
            return redirect()
                ->back()
                ->with(
                    'messages',
                    AlertDto::success(
                        __(':feature updated successfully', [
                            'feature' => __('Intermediation Rule'),
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
                        'feature' => __('Intermediation Rule'),
                    ])
                )
            );
    }

    /**
     * Delete intermediation rule.
     */
    public function delete(
        IntermediationRule $intermediationRule,
    ): RedirectResponse {
        if (
            static::handleDelete(
                $intermediationRule
            )
        ) {
            return redirect()
                ->back()
                ->with(
                    'messages',
                    AlertDto::success(
                        __(':feature processed successfully', [
                            'feature' => __('Intermediation Rule'),
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
                        'feature' => __('Intermediation Rule'),
                    ])
                )
            );
    }

    /**
     * Return one rule as JSON.
     */
    public function showJson(
        IntermediationRule $intermediationRule,
    ): JsonResponse {
        return response()->json(
            IntermediationRuleData::from(
                $intermediationRule
            )
        );
    }

    public function listJson(
        SelectQueryData $request,
    ): JsonResponse {
        $selectedKey = in_array(
            $request->selectedKey,
            ['id', 'name', 'code'],
            true
        )
            ? $request->selectedKey
            : 'id';

        $query = IntermediationRule::query()
            ->when(
                $request->search !== '',
                fn (Builder $query) => $query->whereAny(
                    [
                        'name',
                        'code',
                    ],
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
            $selectedItems = IntermediationRule::query()
                ->whereIn(
                    $selectedKey,
                    $request->selectedValues
                )
                ->get();

            $items = $selectedItems
                ->concat($items)
                ->unique(
                    fn (IntermediationRule $rule) =>
                    $rule->getAttribute($selectedKey)
                )
                ->values();
        }

        $paginator->setCollection(
            $items
                ->map(
                    fn (IntermediationRule $rule) =>
                    IntermediationRuleData::from($rule)
                )
                ->values()
        );

        return response()->json($paginator);
    }
    private static function handleCreate(
        IntermediationRuleData $data,
    ): bool {
        try {
            DB::transaction(function () use ($data) {
                IntermediationRule::create([
                    'name' => $data->name,
                    'code' => $data->code,
                    'percentage' => $data->percentage,
                ]);
            });

            return true;
        } catch (Throwable $throwable) {
            report($throwable);

            return false;
        }
    }

    private static function handleUpdate(
        IntermediationRule $intermediationRule,
        IntermediationRuleData $data,
    ): bool {
        try {
            DB::transaction(
                function () use (
                    $intermediationRule,
                    $data
                ) {
                    $intermediationRule->update([
                        'name' => $data->name,
                        'code' => $data->code,
                        'percentage' => $data->percentage,
                    ]);
                }
            );

            return true;
        } catch (Throwable $throwable) {
            report($throwable);

            return false;
        }
    }

    private static function handleDelete(
        IntermediationRule $intermediationRule,
    ): bool {
        try {
            DB::transaction(
                function () use ($intermediationRule) {
                    $intermediationRule->delete();
                }
            );

            return true;
        } catch (Throwable $throwable) {
            report($throwable);

            return false;
        }
    }

    private function applySearch(
        Builder $query,
        IntermediationRuleRequestFilters $filters,
    ): void {
        if (!$filters->search) {
            return;
        }

        $search = trim($filters->search);

        if ($search === '') {
            return;
        }

        $query->whereAny(
            [
                'name',
                'code',
            ],
            'like',
            '%' . $search . '%',
        );
    }

    private function applySorting(
        Builder $query,
        IntermediationRuleRequestFilters $filters,
    ): void {
        $sort = $filters->sort ?: 'name';

        $direction = str_starts_with($sort, '-')
            ? 'desc'
            : 'asc';

        $column = ltrim($sort, '-');

        $allowedColumns = [
            'id',
            'name',
            'code',
            'percentage',
        ];

        if (!in_array($column, $allowedColumns, true)) {
            $column = 'name';
            $direction = 'asc';
        }

        $query->orderBy(
            $column,
            $direction
        );
    }

    private function resolvePerPage(
        ?string $perPage,
    ): int {
        $value = (int) ($perPage ?: 12);

        return min(
            max($value, 5),
            100
        );
    }

    private function getSelectedItem(
        Request $request,
    ): ?IntermediationRule {
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
            'code',
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

        return IntermediationRule::query()
            ->where(
                $selectedKey,
                $selectedValue
            )
            ->first();
    }
}
