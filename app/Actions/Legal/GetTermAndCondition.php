<?php

namespace App\Actions\Legal;

use App\Models\Termo;
use App\Support\Enums\SystemRoles;
use Inertia\Inertia;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class GetTermAndCondition
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

    public function handle()
    {
        if (Termo::first() == null) {
            Termo::create([
                'termos' => '',
            ]);
        }

        return Termo::first()->getData();
    }

    public function AsController()
    {
        return Inertia::render('Legal/Terms', [
            'term' => $this->handle(),
        ]);
    }
}
