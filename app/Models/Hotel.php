<?php

namespace App\Models;

use App\Data\HotelData;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Str;
use Pricecurrent\LaravelEloquentFilters\Filterable;
use Spatie\LaravelData\WithData;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\SlugOptions;

/**
 * App\Models\Hotel
 *
 * @property int $id
 * @property int $hotel_meta_data_id
 * @property float|null $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\HotelMetaData $hotelMetaData
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Hotel filter(\Pricecurrent\LaravelEloquentFilters\EloquentFilters $filters)
 * @method static \Illuminate\Database\Eloquent\Builder|Hotel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hotel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hotel query()
 * @method static \Illuminate\Database\Eloquent\Builder|Hotel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hotel whereHotelMetaDataId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hotel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hotel wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hotel whereUpdatedAt($value)
 *
 * @property string|null $email
 * @property string|null $title
 * @property string|null $description
 * @property string|null $contact
 * @property string|null $slug
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Attribute> $attributes
 * @property-read int|null $attributes_count
 * @property-read mixed $preco
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Hotel whereContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hotel whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hotel whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hotel whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hotel whereTitle($value)
 *
 * @mixin \Eloquent
 */
class Hotel extends Model implements HasMedia
{
    use Filterable;
    use HasFactory;
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
        $this->addMediaCollection('hotels')->withResponsiveImages()->singleFile();
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
