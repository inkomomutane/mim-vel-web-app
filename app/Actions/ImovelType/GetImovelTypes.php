<?php

namespace App\Actions\ImovelType;

use App\Data\ImovelTypeData;
use App\Models\TipoDeImovel;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class GetImovelTypes
{
    use AsController;
    use AsAction;

    public function handle(?string $term = null)
    {

        $bairros = TipoDeImovel::query()
            ->when($term, function ($query, $search) {
                $query->where('nome', 'like', '%'.$search.'%');
            })->orderBy('created_at', 'desc')->paginate(5)->withQueryString();

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
