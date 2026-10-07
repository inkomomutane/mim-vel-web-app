<?php

namespace App\Http\Controllers\Management\BusinessRule;

use App\Data\BusinessRuleData;
use App\Data\BusinessRuleRequestFilters;
use App\Models\BusinessRule;
use Illuminate\Database\Eloquent\Builder;
use Inertia\Inertia;
use Inertia\Response;

class ListBusinessRuleController
{
    public function __invoke(
        BusinessRuleRequestFilters $filters,
    ): Response {
        $query = BusinessRule::query();

        $this->applySearch($query, $filters);
        $this->applySorting($query, $filters);

        $businessRules = $query
            ->paginate(
                $this->resolvePerPage($filters->per_page)
            )
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

    private function applySearch(
        Builder $query,
        BusinessRuleRequestFilters $filters,
    ): void {
        $search = trim($filters->search ?? '');

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
        BusinessRuleRequestFilters $filters,
    ): void {
        $sort = $filters->sort ?: 'name';

        $direction = str_starts_with($sort, '-')
            ? 'desc'
            : 'asc';

        $column = ltrim($sort, '-');

        if (!in_array($column, ['id', 'name'], true)) {
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
}
