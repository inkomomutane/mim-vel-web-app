<?php

namespace App\Actions\User;

use App\Data\UserData;
use App\Models\User;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class GetUsers
{
    use AsAction;
    use AsController;

    public function handle(string $term = null)
    {
        return UserData::collection(
            User::query()
                ->when($term, function ($query, $search) {
                    $query->where('name', 'like', '%'.$search.'%')
                        ->orWhere('email', 'like', '%'.$search.'%');
                    $query->with('roles');
                })->with('roles')->
            orderBy('created_at', 'desc')->paginate(5)->withQueryString()
        );
    }

    public function AsController(): \Inertia\Response
    {
        return Inertia::render('User/Index', [
            'users' => $this->handle(request()->search),
        ]);
    }
}
