<?php

namespace App\Actions\Condicao;

use App\Data\CondicaoData;
use App\Models\Condicao;
use App\Support\Enums\SystemRoles;
use Inertia\Inertia;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class GetCondicaos
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

    public function handle(?string $term = null)
    {
        return CondicaoData::collection(
            Condicao::query()
                ->when($term, function ($query, $search) {
                    $query->where('nome', 'like', '%'.$search.'%');
                })->
            orderBy('created_at', 'desc')->paginate(5)->withQueryString()
        );
    }

    public function AsController(): \Inertia\Response
    {
        return Inertia::render('Condicao/Index', [
            'condicaos' => $this->handle(request()->search),
        ]);
    }
}
