<?php

namespace App\Actions\Imovel;

use App\Actions\UserTreeInIdArray;
use App\Data\ImovelData;
use App\Models\Imovel;
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
            SystemRoles::SUBADMIN
        );
    }

    public function handle(?string $term, User $user)
    {
        if ($user->hasAnyRole(SystemRoles::SUPERADMIN, SystemRoles::ADMIN)) {
            return ImovelData::collection(
                $this->getImovels(term: $term, approved: false)->paginate(5)->withQueryString()
            );
        } else {
            /** @var Collection<Imovel> $imovels */
            $imovels = $this->getImovels(term: $term, approved: false);

            return ImovelData::collection($imovels->whereIn('corretor_id', UserTreeInIdArray::run($user
                ->load('createdUsers')))->paginate(5)->withQueryString());
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
