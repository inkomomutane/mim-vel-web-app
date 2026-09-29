<?php

namespace App\Models;

use App\Data\HotelData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Spatie\LaravelData\WithData;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Hotel extends Model implements HasMedia
{
    use HasSlug;
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

    protected $casts = [
        'price' => 'float',
        'hotel_meta_data_id' => 'int',
    ];

    public function hotelMetaData(): BelongsTo
    {
        return $this->belongsTo(HotelMetaData::class);
    }

    public function attributes(): MorphToMany
    {
        return $this->morphToMany(
            Attribute::class,
            'attributable',
        );
    }

    public function registerMediaConversions(
        ?Media $media = null,
    ): void {
        $this->addMediaConversion('thumb')
            ->width(200)
            ->nonQueued();

        $this->addMediaConversion('social-media')
            ->width(720)
            ->nonQueued();
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('hotels')
            ->withResponsiveImages();
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
}
