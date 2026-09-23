<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Data\PageData;
use App\Support\Enums\Pages;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\WithData;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Page extends Model implements HasMedia
{
    use HasFactory;
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

    protected $dataClass = PageData::class;

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(Pages::HOME)->withResponsiveImages()->singleFile();
        $this->addMediaCollection(Pages::IMOVELS)->withResponsiveImages()->singleFile();
        $this->addMediaCollection(Pages::ABOUT)->withResponsiveImages()->singleFile();
        $this->addMediaCollection(Pages::CONTACT)->withResponsiveImages()->singleFile();
        $this->addMediaCollection(Pages::TERMS)->withResponsiveImages()->singleFile();
        $this->addMediaCollection(Pages::POLICY)->withResponsiveImages()->singleFile();
        $this->addMediaCollection(Pages::LOGO)->withResponsiveImages()->singleFile();
    }
}
