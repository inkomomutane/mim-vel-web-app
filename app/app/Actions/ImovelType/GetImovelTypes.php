<?php

namespace App\Actions\ImovelType;

use App\Data\ImovelTypeData;
use App\Models\TipoDeImovel;
use App\Support\Enums\SystemRoles;
use Inertia\Inertia;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class GetImovelTypes
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

        $bairros = TipoDeImovel::query()
            ->when($term, function ($query, $search) {
                $query->where('nome', 'like', '%'.$search.'%');
            })->with('media')->orderBy('created_at', 'desc')->paginate(5)->withQueryString();

        return ImovelTypeData::collection(
            $bairros
        );
    }

    public function AsController()
    {
        return Inertia::render(
            'ImovelType/Index',
            [
                'imovelTypes' => $this->handle(request()->search),
            ]
        );
    }
}
