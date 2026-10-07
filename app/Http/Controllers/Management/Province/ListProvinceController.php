<?php

namespace App\Http\Controllers\Management\Province;

use App\Data\ProvinceData;
use App\Data\ProvinceRequestFilters;
use App\Models\Province;
use Illuminate\Database\Eloquent\Builder;
use Inertia\Inertia;
use Inertia\Response;

class ListProvinceController
{
    public function __invoke(
        ProvinceRequestFilters $filters,
    ): Response {
        $query = Province::query();

        $this->applySearch(
            $query,
            $filters
        );

        $this->applySorting(
            $query,
            $filters
        );

        $provinces = $query
            ->paginate(
                $this->resolvePerPage(
                    $filters->per_page
                )
            )
            ->withQueryString();

        $provinces->through(
            fn (Province $province) =>
            ProvinceData::from(
                $province
            )
        );

        return Inertia::render(
            'Management/Province/Index',
            [
                'provinces' => $provinces,
                'request' => $filters,
            ]
        );
    }

    private function applySearch(
        Builder $query,
        ProvinceRequestFilters $filters,
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
        ProvinceRequestFilters $filters,
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
