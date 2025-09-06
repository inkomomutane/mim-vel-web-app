<?php

namespace App\Actions\Website;

use App\Actions\Imovel\FilteredImovel;
use App\Data\BairroData;
use App\Data\ImovelData;
use App\Data\ImovelTypeData;
use App\Data\RequestFiltersData;
use App\Filters\ImovelBairroFilter;
use App\Filters\ImovelTipoDeImovelFilter;
use App\Filters\ImovelTitleFilter;
use App\Models\Bairro;
use App\Models\TipoDeImovel;
use Illuminate\Support\Collection;
use Inertia\Inertia;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsController;
use Pricecurrent\LaravelEloquentFilters\AbstractEloquentFilter;
use Pricecurrent\LaravelEloquentFilters\EloquentFilters;

class GetImovels
{
    use AsController;

    public function handle(ActionRequest $actionRequest)
    {
        return ImovelData::collection(FilteredImovel::run(
            EloquentFilters::make($this->FiltersBinder($actionRequest))
        )->paginate(12)->withQueryString());
    }

    public function AsController(ActionRequest $actionRequest)
    {
        return Inertia::render('Website/Imovels', [
            'imovels' => $this->handle($actionRequest),
            'imovelTypes' => ImovelTypeData::collection(TipoDeImovel::all()),
            'bairros' => BairroData::collection(Bairro::all()),
            'filters' => new RequestFiltersData(
                imovelTypes: collect($actionRequest->imovel_types)->map(fn ($number) => (int) $number)->toArray(),
                title: $actionRequest->title,
                bairros: collect($actionRequest->bairros)->map(fn ($number) => (int) $number)->toArray(),
            ),
        ]);
    }

    private function FiltersBinder(ActionRequest $actionRequest): array
    {
        /** @var Collection<AbstractEloquentFilter> filters */
        $filters = collect([]);
        if (! is_null($actionRequest->imovel_types) && is_array($actionRequest->imovel_types) && count($actionRequest->imovel_types) > 0) {
            $filters = $filters->push(new ImovelTipoDeImovelFilter($actionRequest->imovel_types));
        }

        if (! is_null($actionRequest->bairros) && is_array($actionRequest->bairros) && count($actionRequest->bairros) > 0) {
            $filters = $filters->push(new ImovelBairroFilter($actionRequest->bairros));
        }

        if (! is_null($actionRequest->title) && is_string($actionRequest->title)) {
            $filters = $filters->push(new ImovelTitleFilter($actionRequest->title));
        }

        return $filters->toArray();
    }
}
