<?php

namespace App\Actions\Legal;

use App\Models\Politica;
use App\Support\Enums\SystemRoles;
use Inertia\Inertia;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class GetPolicy
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
        if (Politica::first() == null) {
            Politica::create([
                'politicas' => '',
            ]);
        }

        return Politica::first()->getData();
    }

    public function asController()
    {
        return Inertia::render('Legal/Policy', [
            'policy' => $this->handle(),
        ]);
    }
}
