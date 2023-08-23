<?php

namespace App\Actions\Page;

use App\Models\Page;
use App\Support\Enums\SystemRoles;
use Inertia\Inertia;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class GetPage
{
    use AsController;
    use AsAction;

    public function authorize(ActionRequest $request): bool
    {
        /** @var User $user */
        $user = $request->user();

        return $user->hasAnyRole(
            SystemRoles::SUPERADMIN,
            SystemRoles::ADMIN
        );
    }

    public function handle(): Page
    {
        /** @var Page $page */
        $page = Page::first() ?? Page::create([]);

        return $page;
    }

    public function asController()
    {
        return Inertia::render('Page/Index', [
            'pageData' => $this->handle()->load('media')->getData(),
        ]);
    }
}
