<?php

namespace App\Models;

use App\Data\PageData;
use App\Enum\Pages;

use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\WithData;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Page extends Model implements HasMedia
{
    use InteractsWithMedia;
    use WithData;

    protected $table = 'pages';

    protected $casts = [
        'contacts' => 'array',
    ];

    protected $fillable = [
        'name',
        'content',
        'slogan',
        'email',
        'location',
        'facebook',
        'instagram',
        'whatsapp',
        'tiktok',
        'contacts',
    ];

    protected string $dataClass = PageData::class;

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(Pages::HOME->value)->withResponsiveImages()->singleFile();
        $this->addMediaCollection(Pages::IMOVELS->value)->withResponsiveImages()->singleFile();
        $this->addMediaCollection(Pages::ABOUT->value)->withResponsiveImages()->singleFile();
        $this->addMediaCollection(Pages::CONTACT->value)->withResponsiveImages()->singleFile();
        $this->addMediaCollection(Pages::TERMS->value)->withResponsiveImages()->singleFile();
        $this->addMediaCollection(Pages::POLICY->value)->withResponsiveImages()->singleFile();
        $this->addMediaCollection(Pages::LOGO->value)->withResponsiveImages()->singleFile();
    }
}
