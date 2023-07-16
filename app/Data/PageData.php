<?php

namespace App\Data;

use App\Models\Page;
use App\Support\Enums\Pages;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;

/** @typescript */
class PageData extends Data
{
    public function __construct(
        public ?int $id,
        public ?string $name,
        public ?string $content,
        public ?string $slogan,
        public ?string $email,
        public ?string $location,
        public ?string $facebook,
        public ?string $instagram,
        public ?string $whatsapp,
        public ?string $tiktok,
        public ?array $contacts,
        public null|MediaData|Lazy $homeMedia,
        public null|MediaData|Lazy $imovelsMedia,
        public null|MediaData|Lazy $aboutMedia,
        public null|MediaData|Lazy $contactMedia,
        public null|MediaData|Lazy $termsMedia,
        public null|MediaData|Lazy $policyMedia,
    ) {
    }

    public static function fromModel(Page $page)
    {

        return new self(
            id: $page->id,
            name: $page->name,
            content: $page->content,
            slogan: $page->slogan,
            email: $page->email,
            location: $page->location,
            facebook: $page->facebook,
            instagram: $page->instagram,
            whatsapp: $page->whatsapp,
            tiktok: $page->tiktok,
            contacts: $page->contacts,
            homeMedia: Lazy::whenLoaded('media', $page, fn () => ! is_null($page->getFirstMedia(Pages::HOME)) ?
                MediaData::fromModel($page->getFirstMedia(Pages::HOME)) : null),
            imovelsMedia: Lazy::whenLoaded('media', $page, fn () => ! is_null($page->getFirstMedia(Pages::IMOVELS)) ?
                MediaData::fromModel($page->getFirstMedia(Pages::IMOVELS)) : null),
            aboutMedia: Lazy::whenLoaded('media', $page, fn () => ! is_null($page->getFirstMedia(Pages::ABOUT)) ?
                MediaData::fromModel($page->getFirstMedia(Pages::ABOUT)) : null),
            contactMedia: Lazy::whenLoaded('media', $page, fn () => ! is_null($page->getFirstMedia(Pages::CONTACT)) ?
                MediaData::fromModel($page->getFirstMedia(Pages::CONTACT)) : null),
            termsMedia: Lazy::whenLoaded('media', $page, fn () => ! is_null($page->getFirstMedia(Pages::TERMS)) ?
                MediaData::fromModel($page->getFirstMedia(Pages::TERMS)) : null),
            policyMedia: Lazy::whenLoaded('media', $page, fn () => ! is_null($page->getFirstMedia(Pages::POLICY)) ?
                MediaData::fromModel($page->getFirstMedia(Pages::POLICY)) : null),
        );
    }
}
