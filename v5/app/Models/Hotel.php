<?php

namespace App\Models;

use App\Data\HotelData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Str;
use Spatie\LaravelData\WithData;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\SlugOptions;

class Hotel extends Model implements HasMedia
{
    use InteractsWithMedia;
    use WithData;

    protected string $dataClass = HotelData::class;

    protected $fillable = [
        'price',
        'title',
        'description',
        'contact',
        'email',
        'hotel_meta_data_id',
    ];

    public function hotelMetaData(): BelongsTo
    {
        return $this->belongsTo(HotelMetaData::class);
    }

    public function getPrecoAttribute()
    {
        return Str::currencyFormat($this->price, 'MZN ', 2);
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width('200')
            ->nonQueued();

        $this->addMediaConversion('social-media')
            ->width('720')
            ->nonQueued();
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('hotels')->withResponsiveImages();
    }

    /**
     * Get all the tags for the post.
     */
    public function attributes(): MorphToMany
    {
        return $this->morphToMany(Attribute::class, 'attributable');
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
}
