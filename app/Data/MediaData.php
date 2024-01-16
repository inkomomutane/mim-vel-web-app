<?php

namespace App\Data;

use Spatie\LaravelData\Data;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/** @typescript */
class MediaData extends Data
{
    public function __construct(
        public readonly ?int $id,
        public ?string $file_name,
        public ?string $name,
        public ?string $mime_type,
        public ?string $original_url,
        public ?string $preview_url,
        public ?int $size,
        public ?array $custom_properties,
        public null|array|ResponsiveImageData $responsive_images,
        public ?string $srcsets,
    ) {
    }

    public static function fromModel(?Media $media = null)
    {

        if (is_null($media)) {
            return null;
        }

        return new self(
            id: $media->id,
            file_name: $media->file_name,
            name: $media->name,
            mime_type: $media->mime_type,
            original_url: $media->original_url,
            preview_url: $media->preview_url,
            size: $media->size,
            custom_properties: $media->custom_properties,
            responsive_images: $media->responsive_images,
            srcsets: $media->getSrcset()
        );
    }
}

/** @typescript */
class ResponsiveImageData
{
    public function __construct(
        public ?MediaLibraryOriginalData $media_library_original
    ) {
    }
}

/** @typescript */
class MediaLibraryOriginalData
{
    public function __construct(
        public readonly ?string $base64svg,
        public readonly ?array $urls,
    ) {
    }
}
