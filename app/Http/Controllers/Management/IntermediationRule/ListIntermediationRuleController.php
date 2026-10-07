<?php

namespace App\Http\Controllers\Management\IntermediationRule;

use App\Data\IntermediationRuleData;
use App\Data\IntermediationRuleRequestFilters;
use App\Models\IntermediationRule;
use Illuminate\Database\Eloquent\Builder;
use Inertia\Inertia;
use Inertia\Response;

class ListIntermediationRuleController
{
    public function __invoke(
        IntermediationRuleRequestFilters $filters,
    ): Response {
        $query = IntermediationRule::query();

        $this->applySearch(
            $query,
            $filters
        );

        $this->applySorting(
            $query,
            $filters
        );

        $intermediationRules = $query
            ->paginate(
                $this->resolvePerPage(
                    $filters->per_page
                )
            )
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

    private function applySearch(
        Builder $query,
        IntermediationRuleRequestFilters $filters,
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
                'code',
            ],
            'like',
            '%' . $search . '%'
        );
    }

    private function applySorting(
        Builder $query,
        IntermediationRuleRequestFilters $filters,
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
            'code',
            'percentage',
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
        $value = (int) ($perPage ?: 12);

        return min(
            max($value, 5),
            100
        );
    }
}
