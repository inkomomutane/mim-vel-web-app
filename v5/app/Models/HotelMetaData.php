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
use Spatie\Tags\Tag;

class HotelMetaData extends Model implements HasMedia
{
    use HasSlug;
    use HasTags;
    use WithData;
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'address',
        'description',
        'tipo_de_imovel_id',
        'condicao_id',
        'status_id',
        'bairro_id',
        'slug',
    ];

    protected $dataClass = HotelMetaDataDtoData::class;

    protected $table = 'hotel_meta_datas';

    public function tipoDeImovel(): BelongsTo
    {
        return $this->belongsTo(PropertyType::class);
    }

    public function condicao(): BelongsTo
    {
        return $this->belongsTo(PropertyCondition::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function bairro(): BelongsTo
    {
        return $this->belongsTo(
            Neighborhood::class
        );
    }

    public function hotels(): HasMany
    {
        return $this->hasMany(Hotel::class);
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
        $this->addMediaCollection('main_hotels')->withResponsiveImages();
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

    //    public function toSitemapTag(): Url|string|array
    //    {
    //        return Url::create(route('post.imovel.show', $this))
    //            ->setLastModificationDate(Carbon::create($this->updated_at))
    //            ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
    //            ->addImage($this->hasMedia('posts') ? $this->getFirstMedia('posts')->getUrl('social-media') : Vite::asset('resources/js/images/placeholder.svg'))
    //            ->setPriority(0.1);
    //    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Get all the attributes for the hotel metadata.
     */
    public function attributes(): MorphToMany
    {
        return $this->morphToMany(Attribute::class, 'attributable');
    }
}
