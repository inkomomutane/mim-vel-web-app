<?php

namespace App\Actions\Legal;

use App\Models\Term;
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
        if (Term::first() == null) {
            Term::create([
                'termos' => '',
            ]);
        }

        return Term::first()->getData();
    }

    public function AsController()
    {
        return Inertia::render('Legal/Terms', [
            'term' => $this->handle(),
        ]);
    }
}
