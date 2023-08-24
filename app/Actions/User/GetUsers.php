<?php

namespace App\Actions\User;

use App\Actions\UserTreeInIdArray;
use App\Data\UserData;
use App\Models\User;
use App\Support\Enums\SystemRoles;
use Auth;
use Illuminate\Database\Eloquent\Builder;
use Inertia\Inertia;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;
use Spatie\Permission\Models\Role;

class GetUsers
{
    use AsAction;
    use AsController;

    public function authorize(ActionRequest $request): bool
    {
        /** @var User $user */
        $user = $request->user();

        return $user->hasAnyRole(
            SystemRoles::SUPERADMIN,
            SystemRoles::ADMIN,
            SystemRoles::SUBADMIN,
            SystemRoles::REALSTATEAGENCY
        );
    }

    public function handle(string $term = null)
    {

        if (Auth::user()->hasRole(SystemRoles::SUPERADMIN)) {
            return UserData::collection(
                User::query()
                    ->when($term, function ($query, $search) {
                        $query->where('name', 'like', '%' . $search . '%')
                            ->orWhere('email', 'like', '%' . $search . '%');
                        $query->with('roles');
                    })->with('roles')->orderBy('created_at', 'desc')->paginate(5)->withQueryString()
            );
        }

        if (Auth::user()->hasRole(SystemRoles::ADMIN)) {
            return UserData::collection(
                User::query()
                    ->when($term, function ($query, $search) {
                        $query->where('name', 'like', '%' . $search . '%')
                            ->orWhere('email', 'like', '%' . $search . '%');
                        $query->with('roles');
                    })
                    ->whereDoesntHave('roles', function (Builder $query) {
                        $query->whereIn('name', [SystemRoles::SUPERADMIN, SystemRoles::ADMIN]);
                    })
                    ->with('roles')->orderBy('created_at', 'desc')->paginate(5)->withQueryString()
            );
        }

        return  UserData::collection(
            User::query()
                ->when($term, function ($query, $search) {
                    $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%');
                    $query->with('roles');
                })->with('roles')
                ->whereIn('id', UserTreeInIdArray::run(Auth::user()->load('createdUsers')))
                ->whereNot('id', Auth::user()->id)
                ->orderBy('created_at', 'desc')->paginate(5)->withQueryString()
        );
    }

    public function AsController(): \Inertia\Response
    {
        return Inertia::render('User/Index', [
            'users' => $this->handle(request()->search),
        ]);
    }
}
