<?php

namespace App\Http\Controllers\Management\IntermediationRule;

use App\Data\IntermediationRuleData;
use App\Data\SelectQueryData;
use App\Models\IntermediationRule;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;

class ListJsonIntermediationRuleController
{
    public function __invoke(
        SelectQueryData $request,
    ): JsonResponse {
        $selectedKey = in_array(
            $request->selectedKey,
            [
                'id',
                'name',
                'code',
            ],
            true
        )
            ? $request->selectedKey
            : 'id';

        $query = IntermediationRule::query()
            ->when(
                $request->search !== '',
                fn (Builder $query) =>
                $query->whereAny(
                    [
                        'name',
                        'code',
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
            $selectedItems = IntermediationRule::query()
                ->whereIn(
                    $selectedKey,
                    $request->selectedValues
                )
                ->get();

            $items = $selectedItems
                ->concat($items)
                ->unique(
                    fn (IntermediationRule $rule) =>
                    $rule->getAttribute(
                        $selectedKey
                    )
                )
                ->values();
        }

        $paginator->setCollection(
            $items
                ->map(
                    fn (IntermediationRule $rule) =>
                    IntermediationRuleData::from($rule)
                )
                ->values()
        );

        return response()->json(
            $paginator
        );
    }
}
