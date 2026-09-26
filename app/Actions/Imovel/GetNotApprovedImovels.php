<?php

namespace App\Actions\Imovel;

use App\Actions\UserTreeInIdArray;
use App\Data\CardPropertyData;
use App\Models\Property;
use App\Models\User;
use App\Support\Enums\SystemRoles;
use App\Support\Traits\GetImovelsWithSearchScope;
use Auth;
use Inertia\Inertia;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsController;

class GetNotApprovedImovels
{
    use AsController;
    use GetImovelsWithSearchScope;

    public function authorize(ActionRequest $request): bool
    {
        /** @var User $user */
        $user = $request->user();

        return $user->hasAnyRole(
            SystemRoles::SUPERADMIN,
            SystemRoles::ADMIN,
            SystemRoles::SUBADMIN,
            SystemRoles::REALSTATEAGENCY,
            SystemRoles::REALSTATEAGENT
        );
    }

    public function handle(?string $term, User $user)
    {
        if ($user->hasAnyRole(SystemRoles::SUPERADMIN, SystemRoles::ADMIN)) {
            return CardPropertyData::collection(
                $this->getImovels(term: $term, approved: false)->paginate(5)->withQueryString()
            );
        } else {
            /** @var Collection<Property> $imovels */
            $imovels = $this->getImovels(term: $term, approved: false);

            return CardPropertyData::collection($imovels->whereIn('corretor_id', UserTreeInIdArray::run($user))->paginate(5)->withQueryString());
        }
    }

    public function AsController(): \Inertia\Response
    {
        /** @var User $user */
        $user = Auth::user();

        return Inertia::render('Imovel/NotApprovedImovels', [
            'imovels' => $this->handle(request()->search, $user),
            'can' => $user->hasAnyRole([
                SystemRoles::SUPERADMIN,
                SystemRoles::ADMIN,
                SystemRoles::SUBADMIN,
            ]),
        ]);
    }
}
