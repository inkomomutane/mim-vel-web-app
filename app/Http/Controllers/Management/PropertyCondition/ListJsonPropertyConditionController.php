<?php

namespace App\Http\Controllers\Management\PropertyCondition;

use App\Data\PropertyConditionData;
use App\Data\SelectQueryData;
use App\Models\PropertyCondition;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;

class ListJsonPropertyConditionController
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

        $query = PropertyCondition::query()
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
            $selectedItems = PropertyCondition::query()
                ->whereIn(
                    $selectedKey,
                    $request->selectedValues
                )
                ->get();

            $items = $selectedItems
                ->concat($items)
                ->unique(
                    fn (PropertyCondition $condition) =>
                    $condition->getAttribute(
                        $selectedKey
                    )
                )
                ->values();
        }

        $paginator->setCollection(
            $items
                ->map(
                    fn (PropertyCondition $condition) =>
                    PropertyConditionData::from(
                        $condition
                    )
                )
                ->values()
        );

        return response()->json(
            $paginator
        );
    }
}
