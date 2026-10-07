<?php

namespace App\Http\Controllers\Management\Status;

use App\Data\SelectQueryData;
use App\Data\StatusData;
use App\Models\Status;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;

class ListJsonStatusController
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
            true,
        )
            ? $request->selectedKey
            : 'id';

        $query = Status::query()
            ->when(
                $request->search !== '',
                fn (Builder $query) =>
                $query->whereAny(
                    ['name'],
                    'like',
                    '%' . $request->search . '%',
                ),
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
            $selectedItems = Status::query()
                ->whereIn(
                    $selectedKey,
                    $request->selectedValues,
                )
                ->get();

            $items = $selectedItems
                ->concat($items)
                ->unique(
                    fn (Status $status) =>
                    $status->getAttribute(
                        $selectedKey
                    ),
                )
                ->values();
        }

        $paginator->setCollection(
            $items
                ->map(
                    fn (Status $status) =>
                    StatusData::from($status),
                )
                ->values(),
        );

        return response()->json(
            $paginator
        );
    }
}
