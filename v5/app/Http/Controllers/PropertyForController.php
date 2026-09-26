<?php

namespace App\Http\Controllers;

use App\Data\AlertDto;
use App\Data\PropertyForRequestFilters;
use App\Data\SelectQueryData;
use App\Data\TransactionTypeData;
use App\Models\PropertyFor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;
use Throwable;

class PropertyForController
{
    /**
     * Display the property transaction type management page.
     */
    public function index(
        PropertyForRequestFilters $filters,
    ): Response {
        $query = PropertyFor::query();

        $this->applySearch($query, $filters);
        $this->applySorting($query, $filters);

        $perPage = $this->resolvePerPage(
            $filters->per_page
        );

        $propertyFors = $query
            ->paginate($perPage)
            ->withQueryString();

        $propertyFors->through(
            fn (PropertyFor $propertyFor) =>
            TransactionTypeData::from($propertyFor)
        );

        return Inertia::render(
            'Management/PropertyFor/Index',
            [
                'propertyFors' => $propertyFors,
                'request' => $filters,
            ]
        );
    }

    /**
     * Create transaction type.
     */
    public function store(
        TransactionTypeData $data,
    ): RedirectResponse {
        if (static::handleCreate($data)) {
            return redirect()
                ->back()
                ->with(
                    'messages',
                    AlertDto::success(
                        __(':feature created successfully', [
                            'feature' => __('Transaction Type'),
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
                        'feature' => __('Transaction Type'),
                    ])
                )
            );
    }

    /**
     * Update transaction type.
     */
    public function update(
        PropertyFor $propertyFor,
        TransactionTypeData $data,
    ): RedirectResponse {
        if (
            static::handleUpdate(
                $propertyFor,
                $data
            )
        ) {
            return redirect()
                ->back()
                ->with(
                    'messages',
                    AlertDto::success(
                        __(':feature updated successfully', [
                            'feature' => __('Transaction Type'),
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
                        'feature' => __('Transaction Type'),
                    ])
                )
            );
    }

    /**
     * Delete transaction type.
     */
    public function delete(
        PropertyFor $propertyFor,
    ): RedirectResponse {
        if (
            static::handleDelete(
                $propertyFor
            )
        ) {
            return redirect()
                ->back()
                ->with(
                    'messages',
                    AlertDto::success(
                        __(':feature processed successfully', [
                            'feature' => __('Transaction Type'),
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
                        'feature' => __('Transaction Type'),
                    ])
                )
            );
    }

    /**
     * Return one transaction type as JSON.
     */
    public function showJson(
        PropertyFor $propertyFor,
    ): JsonResponse {
        return response()->json(
            TransactionTypeData::from(
                $propertyFor
            )
        );
    }

    public function listJson(
        SelectQueryData $request,
    ): JsonResponse {
        $selectedKey = in_array(
            $request->selectedKey,
            ['id', 'name', 'slug_text'],
            true
        )
            ? $request->selectedKey
            : 'id';

        $query = PropertyFor::query()
            ->when(
                $request->search !== '',
                fn (Builder $query) => $query->whereAny(
                    [
                        'name',
                        'slug_text',
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
            $selectedItems = PropertyFor::query()
                ->whereIn(
                    $selectedKey,
                    $request->selectedValues
                )
                ->get();

            $items = $selectedItems
                ->concat($items)
                ->unique(
                    fn (PropertyFor $propertyFor) =>
                    $propertyFor->getAttribute($selectedKey)
                )
                ->values();
        }

        $paginator->setCollection(
            $items
                ->map(
                    fn (PropertyFor $propertyFor) =>
                    TransactionTypeData::from($propertyFor)
                )
                ->values()
        );

        return response()->json($paginator);
    }

    /**
     * Handle creation.
     */
    private static function handleCreate(
        TransactionTypeData $data,
    ): bool {
        try {
            DB::transaction(
                function () use ($data) {
                    PropertyFor::create([
                        'name' => $data->name,
                        'slug_text' => $data->slug_text,
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
        PropertyFor $propertyFor,
        TransactionTypeData $data,
    ): bool {
        try {
            DB::transaction(
                function () use (
                    $propertyFor,
                    $data
                ) {
                    $propertyFor->update([
                        'name' => $data->name,
                        'slug_text' => $data->slug_text,
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
        PropertyFor $propertyFor,
    ): bool {
        try {
            DB::transaction(
                function () use (
                    $propertyFor
                ) {
                    $propertyFor->delete();
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
        PropertyForRequestFilters $filters,
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
            [
                'name',
                'slug_text',
            ],
            'like',
            '%' . $search . '%'
        );
    }

    /**
     * Apply safe sorting.
     */
    private function applySorting(
        Builder $query,
        PropertyForRequestFilters $filters,
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
            'slug_text',
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
    ): ?PropertyFor {
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
            'slug_text',
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

        return PropertyFor::query()
            ->where(
                $selectedKey,
                $selectedValue
            )
            ->first();
    }
}
