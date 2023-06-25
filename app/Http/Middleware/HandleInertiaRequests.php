<?php

namespace App\Http\Middleware;

use App\Actions\Message\MessageCount;
use App\Data\RoleData;
use App\Models\Page;
use Illuminate\Http\Request;
use Inertia\Middleware;
use Spatie\Permission\Models\Role;
use Tightenco\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'auth' => [
                'user' => $request->user()?->load('roles')->getData(),
            ],
            'messages' => flash()->render([], 'array'),
            'roles' => RoleData::collection(Role::all()),
            'mails' => MessageCount::run(),
            'globals' => Page::first()->getData(),
            'site' => config('app.url'),
            'ziggy' => function () use ($request) {
                return array_merge((new Ziggy)->toArray(), [
                    'location' => $request->url(),
                ]);
            },
        ]);
    }
}
