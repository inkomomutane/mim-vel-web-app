<?php

namespace App\Http\Controllers\Management\PropertyFor;

use App\Data\SelectQueryData;
use App\Data\PropertyForData;
use App\Models\PropertyFor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;

class ListJsonPropertyForController
{
    public function __invoke(
        SelectQueryData $request,
    ): JsonResponse {
        $selectedKey = in_array(
            $request->selectedKey,
            [
                'id',
                'name',
                'slug',
            ],
            true
        )
            ? $request->selectedKey
            : 'id';

        $query = PropertyFor::query()
            ->when(
                $request->search !== '',
                fn (Builder $query) =>
                $query->whereAny(
                    [
                        'name',
                        'slug',
                    ],
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
            $selectedItems = PropertyFor::query()
                ->whereIn(
                    $selectedKey,
                    $request->selectedValues
                )
                ->get();

            $items = $selectedItems
                ->concat($items)
                ->unique(
                    fn (PropertyFor $propertyFor) =>
                    $propertyFor->getAttribute(
                        $selectedKey
                    )
                )
                ->values();
        }

        $paginator->setCollection(
            $items
                ->map(
                    fn (PropertyFor $propertyFor) =>
                    PropertyForData::from(
                        $propertyFor
                    )
                )
                ->values()
        );

        return response()->json(
            $paginator
        );
    }
}
