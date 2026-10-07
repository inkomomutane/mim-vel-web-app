<?php

namespace App\Http\Controllers\Management\Province;

use App\Data\ProvinceData;
use App\Data\SelectQueryData;
use App\Models\Province;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;

class ListJsonProvinceController
{
    public function __invoke(
        SelectQueryData $request,
    ): JsonResponse {
        $selectedKey = in_array(
            $request->selectedKey,
            [
                'id',
                'name',
            ],
            true
        )
            ? $request->selectedKey
            : 'id';

        $query = Province::query()
            ->when(
                $request->search !== '',
                fn (Builder $query) =>
                $query->whereAny(
                    ['name'],
                    'like',
                    '%' . $request->search . '%'
                )
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
            $selectedItems = Province::query()
                ->whereIn(
                    $selectedKey,
                    $request->selectedValues
                )
                ->get();

            $items = $selectedItems
                ->concat($items)
                ->unique(
                    fn (Province $province) =>
                    $province->getAttribute(
                        $selectedKey
                    )
                )
                ->values();
        }

        $paginator->setCollection(
            $items
                ->map(
                    fn (Province $province) =>
                    ProvinceData::from(
                        $province
                    )
                )
                ->values()
        );

        return response()->json(
            $paginator
        );
    }
}
