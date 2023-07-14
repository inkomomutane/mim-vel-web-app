<?php

namespace App\Actions\Imovel;

use App\Models\Imovel;
use Lorisleiva\Actions\Concerns\AsAction;
use Pricecurrent\LaravelEloquentFilters\EloquentFilters;

class FilteredImovel
{
    use AsAction;

    public function handle(EloquentFilters $filters)
    {
        return Imovel::filter($filters)
            ->with(
                [
                    'corretor',
                    'condicao',
                    'status',
                    'regraDeNegocio',
                    'tipo_de_imovel',
                    'imovelFor',
                    'bairro.cidade.province',
                    'intermediationRule',
                    'media'
                ]
            );
    }
}
