<?php

namespace App\Actions\Bairro;

use App\Data\BairroData;
use App\Data\CityData;
use App\Models\Bairro;
use App\Models\Cidade;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class GetBairros
{
    use AsAction;
    use AsController;

    public function handle(?string $term = null)
    {

        $bairros = Bairro::query()
        ->when($term, function ($query, $search) {
            $query->where('nome', 'like', '%'.$search.'%');
            $query->with('cidade');
        })->with('cidade')->
       orderBy('created_at', 'desc')->paginate(5)->withQueryString();

       $bairros->each(function ($bairro) {
            $bairro->setRelation('city', $bairro->cidade);
            $bairro->unsetRelation('cidade');

            return $bairro;
        });

        return BairroData::collection(
            $bairros
        );
    }

    public function AsController(): \Inertia\Response
    {
        return Inertia::render('Bairro/Index', [
            'bairros' => $this->handle(request()->search),
            'cities' => CityData::collection(Cidade::all()),
        ]);
    }
}
