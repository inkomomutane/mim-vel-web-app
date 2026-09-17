<?php

namespace App\Services;

use App\Models\User;
use Auth0\Laravel\UserRepositoryContract;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Fluent;

class CustomUserRepository implements UserRepositoryContract
{

    public function fromAccessToken(array $user): ?Authenticatable
    {

        if(!isset($user['sub'])) {
            return null;
        }

        return User::where('auth0_id', $user['sub'])->first();
    }

    public function fromSession(array $user): ?Authenticatable
    {
        $userModel = Fluent::make($user);
        $sub = $userModel->sub;
        $email = $userModel->email ?? null;

        $localUser = User::
        query()->when($sub, function ($query) use ($sub) {
            $query->where('auth0_id', $sub);
        })
            ->when($email, function ($query) use ($email) {
                $query->orWhere('email', $email);
            })
            ->first();

        if ($localUser) {
            $localUser->update([
                'auth0_id' => $sub,
                'name'     => $userModel->name ?? $localUser->name,
                'email'    => $email ?? $localUser->email,
            ]);

            return $localUser;
        }

        return User::create([
            'auth0_id' => $sub,
            'name'     => $userModel->name ?? 'User',
            'email'    => $email,
            'password' => bcrypt(str()->random(16)),
        ]);
    }
}
