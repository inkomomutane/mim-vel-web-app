<?php

namespace App\Http\Controllers\Management\City;

use App\Data\CityData;
use App\Data\CityRequestFilters;
use App\Models\City;
use Illuminate\Database\Eloquent\Builder;
use Inertia\Inertia;
use Inertia\Response;

class ListCityController
{
    public function __invoke(
        CityRequestFilters $filters,
    ): Response {
        $query = City::query()
            ->with('province');

        $this->applySearch(
            $query,
            $filters
        );

        $this->applySorting(
            $query,
            $filters
        );

        $cities = $query
            ->paginate(
                $this->resolvePerPage(
                    $filters->per_page
                )
            )
            ->withQueryString();

        $cities->through(
            fn (City $city) => CityData::from([
                'id' => $city->id,
                'name' => $city->name,
                'province_id' => $city->province_id,
                'province_name' => $city->province?->name,
            ])
        );

        return Inertia::render(
            'Management/City/Index',
            [
                'cities' => $cities,
                'request' => $filters,
            ],
        );
    }

    private function applySearch(
        Builder $query,
        CityRequestFilters $filters,
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
                        '%' . $search . '%'
                    )
                    ->orWhereHas(
                        'province',
                        fn (Builder $query) =>
                        $query->where(
                            'name',
                            'like',
                            '%' . $search . '%'
                        )
                    );
            }
        );
    }

    private function applySorting(
        Builder $query,
        CityRequestFilters $filters,
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
            'province_id',
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
