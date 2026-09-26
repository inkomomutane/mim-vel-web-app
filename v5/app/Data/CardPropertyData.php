<?php

namespace App\Data;

use App\Models\Property;
use Illuminate\Support\Str;
use Spatie\LaravelData\Data;

/** @typescript */
class CardPropertyData extends Data
{
    /**
     * @param array<int, ImageData> $images
     */
    public function __construct(
        public readonly int $id,

        public readonly string $title,
        public readonly ?string $subtitle,
        public readonly ?string $description,
        public readonly ?string $details,

        /*
         * Keep money as a decimal string.
         * Do not send a formatted price from Laravel.
         */
        public readonly ?string $price_amount,
        public readonly string $currency_code,

        public readonly ?int $bathrooms,
        public readonly ?int $floors,
        public readonly ?float $area,
        public readonly ?int $bedrooms,
        public readonly ?int $suites,
        public readonly ?int $garages,
        public readonly ?int $pools,

        public readonly ?string $address,

        /*
         * Flattened relations.
         */
        public readonly ?string $condition_name,
        public readonly ?string $neighbourhood_name,
        public readonly ?string $city_name,
        public readonly ?string $property_type_name,
        public readonly ?string $status_name,
        public readonly ?string $agent_name,
        public readonly ?string $transaction_type_name,

        public readonly bool $for_rent,

        public readonly ?float $rating_average,
        public readonly int $rating_count,

        public readonly string $slug,
        public readonly string $url,

        public readonly ?string $published_at,

        /** @var array<int, ImageData> */
        public readonly array $images,
    ) {
    }

    public static function fromModel(Property $property): self
    {
        $rawPrice = $property->getRawOriginal('preco');

        $images = $property->relationLoaded('media')
            ? $property
                ->getMedia('posts')
                ->map(
                    fn ($media) => ImageData::fromModel($media)
                )
                ->values()
                ->all()
            : [];

        return new self(
            id: $property->id,

            title: $property->titulo,
            subtitle: self::getSubtitle($property),

            description: $property->descricao
                ? Str::limit(strip_tags($property->descricao), 160)
                : null,

            details: $property->details ?? null,

            /*
             * Important:
             * do not use $property->preco here because your model casts it
             * to float.
             */
            price_amount: $rawPrice !== null
                ? (string) $rawPrice
                : null,

            currency_code: 'MZN',

            bathrooms: $property->banheiros,
            floors: $property->andares,
            area: $property->area,
            bedrooms: $property->quartos,
            suites: $property->suites,
            garages: $property->garagens,
            pools: $property->piscinas,

            address: $property->endereco,

            condition_name: $property->condicao?->nome,
            neighbourhood_name: $property->bairro?->nome,
            city_name: $property->bairro?->cidade?->nome,
            property_type_name: $property->tipo_de_imovel?->nome,
            status_name: $property->status?->nome,
            agent_name: $property->corretor?->name,
            transaction_type_name: $property->imovelFor?->nome,

            for_rent: (bool) $property->for_rent,

            rating_average: $property->getAttribute('ratings_avg_rating') !== null
                ? (float) $property->getAttribute('ratings_avg_rating')
                // random nomber from 4.0 to 5.0 if no ratings number should be like 4.45 4.87
                : round(mt_rand(400, 500) / 100, 2),

            rating_count: (int) (
                $property->getAttribute('ratings_count') ?? 0
            ),

            slug: $property->slug,

            /*
             * Sending the URL from Laravel is better than making the
             * card depend on Ziggy just to create a link.
             */
            url: route('post.imovel.show', [
                'imovel' => $property->slug,
            ]),

            published_at: $property->published_at?->toIso8601String(),

            images: $images,
        );
    }

    private static function getSubtitle(Property $property): string
    {
        // Helper function to format the string only if the value exists
        $format = fn($value, $singular, $plural) => $value ? "$value " . ($value > 1 ? $plural : $singular) : null;

        $subtitleParts = array_filter([
            $format($property->quartos, 'quarto', 'quartos'),
            $format($property->banheiros, 'banheiro', 'banheiros'),
            $format($property->garagens, 'garagem', 'garagens'),
            $format($property->piscinas, 'piscina', 'piscinas'),
            $format($property->suites, 'suíte', 'suítes'),
        ]);

        return implode(' · ', $subtitleParts) ?: ' Sem detalhes';
    }
}
