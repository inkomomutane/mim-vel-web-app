<?php

namespace App\Actions\RegraDeNegocio;

use App\Data\RegraDeNegocioData;
use App\Models\RegraDeNegocio;
use App\Support\Enums\SystemRoles;
use Inertia\Inertia;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class GetRegrasDeNegocio
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

    public function handle(string $term = null)
    {
        return RegraDeNegocioData::collection(
            RegraDeNegocio::query()
                ->when($term, function ($query, $search) {
                    $query->where('name', 'like', '%'.$search.'%');
                })->
            orderBy('created_at', 'desc')->paginate(5)->withQueryString()
        );
    }

    public function asController()
    {
        return Inertia::render('Negocio/Index', [
            'regrasDeNegocio' => $this->handle(request()->search),
        ]);
    }
}
