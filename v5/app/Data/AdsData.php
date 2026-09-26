<?php

namespace App\Data;

use App\Models\Banner;
use Spatie\LaravelData\Data;

class AdsData extends Data
{
    public function __construct(
        public readonly ?int $id =null,
        public readonly ?string $ads_title = null,
        public readonly ?string $ads_subtitle = null,
        public readonly ?string $ads_link = null,
        public readonly ?string $type = 'ads',
        /** @var array<int, ImageData> */
        public ?array $images =[],
    )
    {
    }


    public static function fromModel(Banner $banner): self
    {
        return new self(
            id: $banner->id,
            ads_title: $banner->ads_title,
            ads_subtitle:  $banner->ads_subtitle,
            ads_link:  $banner->ads_link,
            type:  $banner->type,
            images: $banner->relationLoaded('media')
                ? $banner
                    ->getMedia('banners')
                    ->map(
                        fn ($media) => ImageData::fromModel($media)
                    )
                    ->values()
                    ->all()
                : []
        );
    }
}
