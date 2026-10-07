<?php

namespace App\Http\Controllers\Management\Status;

use App\Data\StatusData;
use App\Data\StatusRequestFilters;
use App\Models\Status;
use Illuminate\Database\Eloquent\Builder;
use Inertia\Inertia;
use Inertia\Response;

class ListStatusController
{
    public function __invoke(
        StatusRequestFilters $filters,
    ): Response {
        $query = Status::query();

        $this->applySearch(
            $query,
            $filters,
        );

        $this->applySorting(
            $query,
            $filters,
        );

        $statuses = $query
            ->paginate(
                $this->resolvePerPage(
                    $filters->per_page,
                ),
            )
            ->withQueryString();

        $statuses->through(
            fn (Status $status) =>
            StatusData::from($status),
        );

        return Inertia::render(
            'Management/Status/Index',
            [
                'statuses' => $statuses,
                'request' => $filters,
            ],
        );
    }

    private function applySearch(
        Builder $query,
        StatusRequestFilters $filters,
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
            '%' . $search . '%',
        );
    }

    private function applySorting(
        Builder $query,
        StatusRequestFilters $filters,
    ): void {
        $sort = $filters->sort ?: 'name';

        $direction = str_starts_with(
            $sort,
            '-',
        )
            ? 'desc'
            : 'asc';

        $column = ltrim(
            $sort,
            '-',
        );

        $allowedColumns = [
            'id',
            'name',
        ];

        if (
            !in_array(
                $column,
                $allowedColumns,
                true,
            )
        ) {
            $column = 'name';
            $direction = 'asc';
        }

        $query->orderBy(
            $column,
            $direction,
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
                5,
            ),
            100,
        );
    }
}
