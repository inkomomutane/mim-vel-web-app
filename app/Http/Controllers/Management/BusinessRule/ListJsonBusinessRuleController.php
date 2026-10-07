<?php

namespace App\Http\Controllers\Management\BusinessRule;

use App\Data\BusinessRuleData;
use App\Data\SelectQueryData;
use App\Models\BusinessRule;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;

class ListJsonBusinessRuleController
{
    public function __invoke(
        SelectQueryData $request,
    ): JsonResponse {
        $selectedKey = in_array(
            $request->selectedKey,
            ['id', 'name'],
            true
        )
            ? $request->selectedKey
            : 'id';

        $query = BusinessRule::query()
            ->when(
                $request->search !== '',
                fn (Builder $query) => $query->whereAny(
                    ['name'],
                    'like',
                    '%' . $request->search . '%'
                )
            )
            ->orderBy('name')
            ->orderBy('id');

        $paginator = $query->paginate(
            perPage: 25,
            page: max(1, $request->page),
        );

        $items = $paginator->getCollection();

        if (
            $request->page === 1 &&
            !empty($request->selectedValues)
        ) {
            $selectedItems = BusinessRule::query()
                ->whereIn(
                    $selectedKey,
                    $request->selectedValues
                )
                ->get();

            $items = $selectedItems
                ->concat($items)
                ->unique(
                    fn (BusinessRule $businessRule) =>
                    $businessRule->getAttribute($selectedKey)
                )
                ->values();
        }

        $paginator->setCollection(
            $items
                ->map(
                    fn (BusinessRule $businessRule) =>
                    BusinessRuleData::from($businessRule)
                )
                ->values()
        );

        return response()->json($paginator);
    }
}
