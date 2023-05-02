<?php

namespace App\Actions\TranstionType;

use App\Data\TransactionTypeData;
use App\Models\ImovelFor;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class GetTransactionTypes
{
    use AsAction;
    use AsController;

    public function handle(?string $term = null)
    {
        return TransactionTypeData::collection(
            ImovelFor::query()
            ->when($term, function ($query, $search) {
                $query->where('name', 'like', '%'.$search.'%');
            })->
            orderBy('created_at', 'desc')->paginate(5)->withQueryString()
        );
    }

    public function AsController(): \Inertia\Response
    {
        return Inertia::render('TransactionType/Index', [
            'transactionTypes' => $this->handle(request()->search),
        ]);
    }
}
