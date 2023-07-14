<?php

namespace App\Data;

use App\Models\Page;
use App\Support\Enums\Pages;
use Spatie\LaravelData\Data;

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
        public ?MediaData $homeMedia,
        public ?MediaData $imovelsMedia,
        public ?MediaData $aboutMedia,
        public ?MediaData $contactMedia,
        public ?MediaData $termsMedia,
        public ?MediaData $policyMedia,
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
            homeMedia: MediaData::fromModel($page->getFirstMedia(Pages::HOME)),
            imovelsMedia: MediaData::fromModel($page->getFirstMedia(Pages::IMOVELS)),
            aboutMedia: MediaData::fromModel($page->getFirstMedia(Pages::ABOUT)),
            contactMedia: MediaData::fromModel($page->getFirstMedia(Pages::CONTACT)),
            termsMedia: MediaData::fromModel($page->getFirstMedia(Pages::TERMS)),
            policyMedia: MediaData::fromModel($page->getFirstMedia(Pages::POLICY))
        );
    }
}
