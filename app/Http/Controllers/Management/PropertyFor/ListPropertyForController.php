<?php

namespace App\Http\Controllers\Management\PropertyFor;

use App\Data\PropertyForRequestFilters;
use App\Data\TransactionTypeData;
use App\Models\PropertyFor;
use Illuminate\Database\Eloquent\Builder;
use Inertia\Inertia;
use Inertia\Response;

class ListPropertyForController
{
    public function __invoke(
        PropertyForRequestFilters $filters,
    ): Response {
        $query = PropertyFor::query();

        $this->applySearch(
            $query,
            $filters
        );

        $this->applySorting(
            $query,
            $filters
        );

        $propertyFors = $query
            ->paginate(
                $this->resolvePerPage(
                    $filters->per_page
                )
            )
            ->withQueryString();

        $propertyFors->through(
            fn (PropertyFor $propertyFor) =>
            TransactionTypeData::from(
                $propertyFor
            )
        );

        return Inertia::render(
            'Management/PropertyFor/Index',
            [
                'propertyFors' => $propertyFors,
                'request' => $filters,
            ]
        );
    }

    private function applySearch(
        Builder $query,
        PropertyForRequestFilters $filters,
    ): void {
        $search = trim(
            $filters->search ?? ''
        );

        if ($search === '') {
            return;
        }

        $query->whereAny(
            [
                'name',
                'slug',
            ],
            'like',
            '%' . $search . '%'
        );
    }

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
            'slug',
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

    private function resolvePerPage(
        ?string $perPage,
    ): int {
        $value = (int) (
        $perPage ?: 12
        );

        return min(
            max(
                $value,
                5
            ),
            100
        );
    }
}
