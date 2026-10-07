<?php

namespace App\Http\Controllers\Management\Neighborhood;

use App\Data\NeighborhoodData;
use App\Data\NeighborhoodRequestFilters;
use App\Models\Neighborhood;
use Illuminate\Database\Eloquent\Builder;
use Inertia\Inertia;
use Inertia\Response;

class ListNeighborhoodController
{
    public function __invoke(
        NeighborhoodRequestFilters $filters,
    ): Response {
        $query = Neighborhood::query()
            ->with('city.province');

        $this->applySearch(
            $query,
            $filters,
        );

        $this->applySorting(
            $query,
            $filters,
        );

        $neighborhoods = $query
            ->paginate(
                $this->resolvePerPage(
                    $filters->per_page
                )
            )
            ->withQueryString();

        $neighborhoods->through(
            fn (Neighborhood $neighborhood) =>
            NeighborhoodData::fromModel(
                $neighborhood
            )
        );

        return Inertia::render(
            'Management/Neighborhood/Index',
            [
                'neighborhoods' => $neighborhoods,
                'request' => $filters,
            ],
        );
    }

    private function applySearch(
        Builder $query,
        NeighborhoodRequestFilters $filters,
    ): void {
        $search = trim(
            $filters->search ?? ''
        );

        if ($search === '') {
            return;
        }

        $query->where(
            function (Builder $query) use ($search) {
                $query
                    ->where(
                        'name',
                        'like',
                        '%' . $search . '%',
                    )
                    ->orWhereHas(
                        'city',
                        function (Builder $query) use ($search) {
                            $query
                                ->where(
                                    'name',
                                    'like',
                                    '%' . $search . '%',
                                )
                                ->orWhereHas(
                                    'province',
                                    fn (Builder $query) =>
                                    $query->where(
                                        'name',
                                        'like',
                                        '%' . $search . '%',
                                    ),
                                );
                        },
                    );
            },
        );
    }

    private function applySorting(
        Builder $query,
        NeighborhoodRequestFilters $filters,
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
            'city_id',
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
