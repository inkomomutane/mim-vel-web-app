<?php

namespace App\Models;

use App\Data\HotelMetaDataDtoData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Spatie\LaravelData\WithData;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Tags\HasTags;

class HotelMetaData extends Model implements HasMedia
{
    use HasSlug;
    use HasTags;
    use InteractsWithMedia;
    use WithData;

    protected string $dataClass = HotelMetaDataDtoData::class;

    protected $table = 'hotel_meta_datas';

    protected $fillable = [
        'title',
        'address',
        'description',
        'property_type_id',
        'property_condition_id',
        'status_id',
        'neighborhood_id',
        'slug',
    ];

    protected $casts = [
        'property_type_id' => 'int',
        'property_condition_id' => 'int',
        'status_id' => 'int',
        'neighborhood_id' => 'int',
    ];

    public function propertyType(): BelongsTo
    {
        return $this->belongsTo(PropertyType::class);
    }

    public function condition(): BelongsTo
    {
        return $this->belongsTo(
            PropertyCondition::class,
            'property_condition_id',
        );
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function neighborhood(): BelongsTo
    {
        return $this->belongsTo(Neighborhood::class);
    }

    public function hotels(): HasMany
    {
        return $this->hasMany(Hotel::class);
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
        $this->addMediaCollection('main_hotels')
            ->withResponsiveImages();
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
