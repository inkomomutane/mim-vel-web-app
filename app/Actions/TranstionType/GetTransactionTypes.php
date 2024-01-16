<?php

namespace App\Actions\TranstionType;

use App\Data\TransactionTypeData;
use App\Models\ImovelFor;
use App\Support\Enums\SystemRoles;
use Inertia\Inertia;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class GetTransactionTypes
{
    use AsAction;
    use AsController;

    public function authorize(ActionRequest $request): bool
    {
        /** @var User $user */
        $user = $request->user();

        return $user->hasAnyRole(
            SystemRoles::SUPERADMIN,
            SystemRoles::ADMIN
        );
    }

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
