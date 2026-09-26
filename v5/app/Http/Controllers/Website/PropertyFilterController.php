<?php

namespace App\Http\Controllers\Website;

use App\Data\WebsitePropertyFilters;
use App\Http\Controllers\Controller;
use App\Models\Neighborhood;
use App\Models\Property;
use App\Models\PropertyCondition;
use App\Models\PropertyFor;
use App\Models\PropertyType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PropertyFilterController
{
    public function meta(): JsonResponse
    {
        $priceQuery = Property::query()
            ->where('approved', true)
            ->whereNotNull('preco')
            ->where('preco', '>=', 0);

        $minimum = (float) ($priceQuery->min('preco') ?? 0);
        $maximum = (float) ($priceQuery->max('preco') ?? 20_000_000);

        $minimum = max(0, floor($minimum));
        $maximum = max($minimum + 1, ceil($maximum));

        $step = $this->resolvePriceStep(
            minimum: $minimum,
            maximum: $maximum,
        );

        return response()->json([
            'data' => [
                'price' => [
                    'min' => $minimum,
                    'max' => $maximum,
                    'step' => $step,
                    'histogram' => $this->priceHistogram(
                        minimum: $minimum,
                        maximum: $maximum,
                    ),
                ],
            ],
        ]);
    }

    public function options(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'type' => [
                'required',
                'string',
                Rule::in([
                    'propertyTypes',
                    'conditions',
                    'propertyFor',
                    'neighbourhoods',
                ]),
            ],
            'search' => [
                'nullable',
                'string',
                'max:100',
            ],
        ]);

        $search = trim(
            (string) ($validated['search'] ?? ''),
        );

        $data = match ($validated['type']) {
            'propertyTypes' => $this->propertyTypes($search),
            'conditions' => $this->conditions($search),
            'propertyFor' => $this->propertyFor($search),
            'neighbourhoods' => $this->neighbourhoods($search),
        };

        return response()->json([
            'data' => $data,
        ]);
    }

    public function preview(Request $request): JsonResponse
    {
        $filters = WebsitePropertyFilters::from(
            $request->all(),
        );

        $query = Property::query()
            ->where('approved', true);

        $this->applyFilters(
            query: $query,
            filters: $filters,
        );

        return response()->json([
            'data' => [
                'total' => $query->count(),
            ],
        ]);
    }

    private function propertyTypes(
        string $search,
    ): array {
        return PropertyType::query()
            ->when(
                $search !== '',
                fn (Builder $query) => $query->where(
                    'nome',
                    'like',
                    "%{$search}%",
                ),
            )
            ->orderBy('nome')
            ->limit(12)
            ->get()
            ->map(fn (PropertyType $item) => [
                'id' => $item->id,
                'label' => $item->nome,
            ])
            ->values()
            ->all();
    }

    private function conditions(
        string $search,
    ): array {
        return PropertyCondition::query()
            ->when(
                $search !== '',
                fn (Builder $query) => $query->where(
                    'nome',
                    'like',
                    "%{$search}%",
                ),
            )
            ->orderBy('nome')
            ->limit(12)
            ->get()
            ->map(fn (PropertyCondition $item) => [
                'id' => $item->id,
                'label' => $item->nome,
            ])
            ->values()
            ->all();
    }

    private function propertyFor(
        string $search,
    ): array {
        return PropertyFor::query()
            ->when(
                $search !== '',
                fn (Builder $query) => $query->where(
                    'name',
                    'like',
                    "%{$search}%",
                ),
            )
            ->orderBy('nome')
            ->limit(12)
            ->get()
            ->map(fn (PropertyFor $item) => [
                'id' => $item->id,
                'label' => $item->nome,
            ])
            ->values()
            ->all();
    }

    private function neighbourhoods(
        string $search,
    ): array {
        return Neighborhood::query()
            ->with('cidade')
            ->when(
                $search !== '',
                function (Builder $query) use ($search) {
                    $query->where(
                        'nome',
                        'like',
                        "%{$search}%",
                    );

                    $query->orWhereHas(
                        'cidade',
                        fn (Builder $cityQuery) => $cityQuery->where(
                            'nome',
                            'like',
                            "%{$search}%",
                        ),
                    );
                },
            )
            ->orderBy('nome')
            ->limit(12)
            ->get()
            ->map(fn (Neighborhood $item) => [
                'id' => $item->id,
                'label' => $item->nome,
                'subtitle' => $item->cidade
                    ? $item->cidade->nome
                    : null,
            ])
            ->values()
            ->all();
    }

    private function applyFilters(
        Builder $query,
        WebsitePropertyFilters $filters,
    ): void {
        $query
            ->when(
                $filters->minPrice !== null,
                fn (Builder $query) => $query->where(
                    'preco',
                    '>=',
                    max(0, $filters->minPrice),
                ),
            )
            ->when(
                $filters->maxPrice !== null,
                fn (Builder $query) => $query->where(
                    'preco',
                    '<=',
                    max(0, $filters->maxPrice),
                ),
            )
            ->when(
                filled($filters->propertyTypes),
                fn (Builder $query) => $query->whereIn(
                    'tipo_de_imovel_id',
                    $this->normaliseIds(
                        $filters->propertyTypes,
                    ),
                ),
            )
            ->when(
                filled($filters->conditions),
                fn (Builder $query) => $query->whereIn(
                    'condicao_id',
                    $this->normaliseIds(
                        $filters->conditions,
                    ),
                ),
            )
            ->when(
                filled($filters->propertyFor),
                fn (Builder $query) => $query->whereIn(
                    'imovel_for_id',
                    $this->normaliseIds(
                        $filters->propertyFor,
                    ),
                ),
            )
            ->when(
                filled($filters->neighbourhoods),
                fn (Builder $query) => $query->whereIn(
                    'bairro_id',
                    $this->normaliseIds(
                        $filters->neighbourhoods,
                    ),
                ),
            )
            ->when(
                $filters->minBedrooms !== null,
                fn (Builder $query) => $query->where(
                    'quartos',
                    '>=',
                    max(0, $filters->minBedrooms),
                ),
            )
            ->when(
                $filters->maxBedrooms !== null,
                fn (Builder $query) => $query->where(
                    'quartos',
                    '<=',
                    max(0, $filters->maxBedrooms),
                ),
            )
            ->when(
                $filters->minBathrooms !== null,
                fn (Builder $query) => $query->where(
                    'banheiros',
                    '>=',
                    max(0, $filters->minBathrooms),
                ),
            )
            ->when(
                $filters->maxBathrooms !== null,
                fn (Builder $query) => $query->where(
                    'banheiros',
                    '<=',
                    max(0, $filters->maxBathrooms),
                ),
            )
            ->when(
                $filters->minSuites !== null,
                fn (Builder $query) => $query->where(
                    'suites',
                    '>=',
                    max(0, $filters->minSuites),
                ),
            )
            ->when(
                $filters->maxSuites !== null,
                fn (Builder $query) => $query->where(
                    'suites',
                    '<=',
                    max(0, $filters->maxSuites),
                ),
            )
            ->when(
                $filters->minGarages !== null,
                fn (Builder $query) => $query->where(
                    'garagens',
                    '>=',
                    max(0, $filters->minGarages),
                ),
            )
            ->when(
                $filters->maxGarages !== null,
                fn (Builder $query) => $query->where(
                    'garagens',
                    '<=',
                    max(0, $filters->maxGarages),
                ),
            )
            ->when(
                $filters->minPools !== null,
                fn (Builder $query) => $query->where(
                    'piscinas',
                    '>=',
                    max(0, $filters->minPools),
                ),
            )
            ->when(
                $filters->maxPools !== null,
                fn (Builder $query) => $query->where(
                    'piscinas',
                    '<=',
                    max(0, $filters->maxPools),
                ),
            )
            ->when(
                $filters->minFloors !== null,
                fn (Builder $query) => $query->where(
                    'andares',
                    '>=',
                    max(0, $filters->minFloors),
                ),
            )
            ->when(
                $filters->maxFloors !== null,
                fn (Builder $query) => $query->where(
                    'andares',
                    '<=',
                    max(0, $filters->maxFloors),
                ),
            )
            ->when(
                $filters->minArea !== null,
                fn (Builder $query) => $query->where(
                    'area',
                    '>=',
                    max(0, $filters->minArea),
                ),
            )
            ->when(
                $filters->maxArea !== null,
                fn (Builder $query) => $query->where(
                    'area',
                    '<=',
                    max(0, $filters->maxArea),
                ),
            )
            ->when(
                $filters->minYear !== null,
                fn (Builder $query) => $query->where(
                    'ano',
                    '>=',
                    $filters->minYear,
                ),
            )
            ->when(
                $filters->maxYear !== null,
                fn (Builder $query) => $query->where(
                    'ano',
                    '<=',
                    $filters->maxYear,
                ),
            );
    }

    private function normaliseIds(
        array $ids,
    ): array {
        return collect($ids)
            ->map(fn ($id) => (int) $id)
            ->filter(fn (int $id) => $id > 0)
            ->unique()
            ->values()
            ->all();
    }

    private function resolvePriceStep(
        float $minimum,
        float $maximum,
    ): int {
        $range = $maximum - $minimum;

        return match (true) {
            $range <= 100_000 => 1_000,
            $range <= 1_000_000 => 10_000,
            $range <= 5_000_000 => 25_000,
            $range <= 20_000_000 => 50_000,
            default => 100_000,
        };
    }

    private function priceHistogram(
        float $minimum,
        float $maximum,
        int $bucketCount = 28,
    ): array {
        if ($maximum <= $minimum) {
            return array_fill(
                0,
                $bucketCount,
                0,
            );
        }

        $bucketSize = (
                $maximum - $minimum
            ) / $bucketCount;

        $selects = [];
        $bindings = [];

        for (
            $index = 0;
            $index < $bucketCount;
            $index++
        ) {
            $start = $minimum
                + ($bucketSize * $index);

            $end = $start
                + $bucketSize;

            if (
                $index ===
                $bucketCount - 1
            ) {
                $selects[] = "
                    SUM(
                        CASE
                            WHEN preco >= ?
                            AND preco <= ?
                            THEN 1
                            ELSE 0
                        END
                    ) AS bucket_{$index}
                ";
            } else {
                $selects[] = "
                    SUM(
                        CASE
                            WHEN preco >= ?
                            AND preco < ?
                            THEN 1
                            ELSE 0
                        END
                    ) AS bucket_{$index}
                ";
            }

            $bindings[] = $start;
            $bindings[] = $end;
        }

        $row = Property::query()
            ->where('approved', true)
            ->whereNotNull('preco')
            ->where('preco', '>=', 0)
            ->selectRaw(
                implode(',', $selects),
                $bindings,
            )
            ->first();

        return collect(
            range(
                0,
                $bucketCount - 1,
            ),
        )
            ->map(
                fn (int $index) => (int) (
                    $row->{"bucket_{$index}"} ?? 0
                ),
            )
            ->all();
    }
}
