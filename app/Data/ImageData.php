<?php

namespace App\Data;

use Spatie\LaravelData\Data;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/** @typescript */
class ImageData extends Data
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $url,
        public readonly ?string $srcset,
        public readonly ?string $placeholder,
    ) {
    }

    public static function fromModel(Media $media): self
    {
        return new self(
            id: $media->id,
            url: $media->getUrl(),
            srcset: $media->getSrcset() ?: null,
            placeholder: data_get($media->responsive_images,
                'media_library_original.base64svg'
            ),
        );
    }
}
