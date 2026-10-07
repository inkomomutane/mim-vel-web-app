<?php

namespace App\Http\Controllers\Management\City;

use App\Data\CityData;
use App\Data\SelectQueryData;
use App\Models\City;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;

class ListJsonCityController
{
    public function __invoke(
        SelectQueryData $request,
    ): JsonResponse {
        $selectedKey = in_array(
            $request->selectedKey,
            [
                'id',
                'name',
                'province_id',
            ],
            true
        )
            ? $request->selectedKey
            : 'id';

        $query = City::query()
            ->with('province')
            ->when(
                $request->search !== '',
                function (Builder $query) use ($request) {
                    $query->where(
                        function (Builder $query) use ($request) {
                            $query
                                ->where(
                                    'name',
                                    'like',
                                    '%' . $request->search . '%'
                                )
                                ->orWhereHas(
                                    'province',
                                    fn (Builder $query) =>
                                    $query->where(
                                        'name',
                                        'like',
                                        '%' . $request->search . '%'
                                    )
                                );
                        }
                    );
                }
            )
            ->orderBy('name')
            ->orderBy('id');

        $paginator = $query->paginate(
            perPage: 25,
            page: max(
                1,
                $request->page
            ),
        );

        $items = $paginator->getCollection();

        if (
            $request->page === 1 &&
            !empty($request->selectedValues)
        ) {
            $selectedItems = City::query()
                ->with('province')
                ->whereIn(
                    $selectedKey,
                    $request->selectedValues
                )
                ->get();

            $items = $selectedItems
                ->concat($items)
                ->unique(
                    fn (City $city) =>
                    $city->getAttribute(
                        $selectedKey
                    )
                )
                ->values();
        }

        $paginator->setCollection(
            $items
                ->map(
                    fn (City $city) =>
                    CityData::from([
                        'id' => $city->id,
                        'name' => $city->name,
                        'province_id' => $city->province_id,
                        'province_name' => $city->province?->name,
                    ])
                )
                ->values()
        );

        return response()->json(
            $paginator
        );
    }
}
