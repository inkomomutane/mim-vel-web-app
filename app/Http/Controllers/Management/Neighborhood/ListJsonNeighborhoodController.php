<?php

namespace App\Http\Controllers\Management\Neighborhood;

use App\Data\NeighborhoodData;
use App\Data\SelectQueryData;
use App\Models\Neighborhood;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;

class ListJsonNeighborhoodController
{
    public function __invoke(
        SelectQueryData $request,
    ): JsonResponse {
        $selectedKey = in_array(
            $request->selectedKey,
            [
                'id',
                'name',
                'city_id',
            ],
            true,
        )
            ? $request->selectedKey
            : 'id';

        $query = Neighborhood::query()
            ->with('city.province')
            ->when(
                $request->search !== '',
                function (Builder $query) use ($request) {
                    $query->where(
                        function (Builder $query) use ($request) {
                            $query
                                ->where(
                                    'name',
                                    'like',
                                    '%' . $request->search . '%',
                                )
                                ->orWhereHas(
                                    'city',
                                    function (Builder $query) use ($request) {
                                        $query
                                            ->where(
                                                'name',
                                                'like',
                                                '%' . $request->search . '%',
                                            )
                                            ->orWhereHas(
                                                'province',
                                                fn (Builder $query) =>
                                                $query->where(
                                                    'name',
                                                    'like',
                                                    '%' . $request->search . '%',
                                                ),
                                            );
                                    },
                                );
                        },
                    );
                },
            )
            ->orderBy('name')
            ->orderBy('id');

        $paginator = $query->paginate(
            perPage: 25,
            page: max(
                1,
                $request->page,
            ),
        );

        $items = $paginator->getCollection();

        if (
            $request->page === 1 &&
            !empty($request->selectedValues)
        ) {
            $selectedItems = Neighborhood::query()
                ->with('city.province')
                ->whereIn(
                    $selectedKey,
                    $request->selectedValues,
                )
                ->get();

            $items = $selectedItems
                ->concat($items)
                ->unique(
                    fn (Neighborhood $neighborhood) =>
                    $neighborhood->getAttribute(
                        $selectedKey
                    ),
                )
                ->values();
        }

        $paginator->setCollection(
            $items
                ->map(
                    fn (Neighborhood $neighborhood) =>
                    NeighborhoodData::fromModel(
                        $neighborhood
                    ),
                )
                ->values(),
        );

        return response()->json(
            $paginator
        );
    }
}
