<?php

namespace App\Data;

use App\Models\Page;
use Spatie\LaravelData\Data;

class PageData extends Data
{

    public function __construct(
        public ?string $name,
        public ?string $content,
        public ?string $slogan,
        public ?string $email,
        public ?string $location,
        public ?string $facebook,
        public ?string $instagram,
        public ?string $whatsapp,
        public ?string $tiktok,
        public ?array $contacts
    ){}

    public static function rules(): array
    {
        return [
            'name' => ['nullable', 'string', 'max:255'],
            'content' => ['nullable', 'string'],
            'slogan' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'location' => ['nullable', 'string', 'max:255'],
            'facebook' => ['nullable', 'url', 'max:255'],
            'instagram' => ['nullable', 'url', 'max:255'],
            'whatsapp' => ['nullable', 'url', 'max:255'],
            'tiktok' => ['nullable', 'url', 'max:255'],
            'contacts' => ['nullable', 'array'],
        ];
    }


    public static function fromModel(Page $model): self
    {
        return new self(
            name: $model->name,
            content: $model->content,
            slogan: $model->slogan,
            email: $model->email,
            location: $model->location,
            facebook: $model->facebook,
            instagram: $model->instagram,
            whatsapp: $model->whatsapp,
            tiktok: $model->tiktok,
            contacts: $model->contacts,
        );
    }
}
