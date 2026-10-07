<?php

namespace App\Http\Controllers\Management\PropertyCondition;

use App\Data\PropertyConditionData;
use App\Data\PropertyConditionRequestFilters;
use App\Models\PropertyCondition;
use Illuminate\Database\Eloquent\Builder;
use Inertia\Inertia;
use Inertia\Response;

class ListPropertyConditionController
{
    public function __invoke(
        PropertyConditionRequestFilters $filters,
    ): Response {
        $query = PropertyCondition::query();

        $this->applySearch(
            $query,
            $filters
        );

        $this->applySorting(
            $query,
            $filters
        );

        $propertyConditions = $query
            ->paginate(
                $this->resolvePerPage(
                    $filters->per_page
                )
            )
            ->withQueryString();

        $propertyConditions->through(
            fn (PropertyCondition $propertyCondition) =>
            PropertyConditionData::from(
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

    private function applySearch(
        Builder $query,
        PropertyConditionRequestFilters $filters,
    ): void {
        $search = trim(
            $filters->search ?? ''
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

    private function applySorting(
        Builder $query,
        PropertyConditionRequestFilters $filters,
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
