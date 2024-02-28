<?php

namespace App\Models;

use App\Data\HotelMetaDataDtoData;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Spatie\LaravelData\WithData;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sitemap\Tags\Url;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Tags\HasTags;
use Vite;

/**
 * App\Models\HotelMetaData
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $address
 * @property string|null $description
 * @property int $tipo_de_imovel_id
 * @property int $condicao_id
 * @property int $status_id
 * @property int $bairro_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Bairro $bairro
 * @property-read \App\Models\Condicao $condicao
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Hotel> $hotels
 * @property-read int|null $hotels_count
 * @property-read \App\Models\Status $status
 * @property-read \App\Models\TipoDeImovel $tipoDeImovel
 *
 * @method static \Illuminate\Database\Eloquent\Builder|HotelMetaData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HotelMetaData newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HotelMetaData query()
 * @method static \Illuminate\Database\Eloquent\Builder|HotelMetaData whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HotelMetaData whereBairroId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HotelMetaData whereCondicaoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HotelMetaData whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HotelMetaData whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HotelMetaData whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HotelMetaData whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HotelMetaData whereTipoDeImovelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HotelMetaData whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HotelMetaData whereUpdatedAt($value)
 *
 * @property string|null $slug
 * @property \Illuminate\Database\Eloquent\Collection<int, \Spatie\Tags\Tag> $tags
 * @property-read int|null $tags_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|HotelMetaData whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HotelMetaData withAllTags(\ArrayAccess|\Spatie\Tags\Tag|array|string $tags, ?string $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|HotelMetaData withAllTagsOfAnyType($tags)
 * @method static \Illuminate\Database\Eloquent\Builder|HotelMetaData withAnyTags(\ArrayAccess|\Spatie\Tags\Tag|array|string $tags, ?string $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|HotelMetaData withAnyTagsOfAnyType($tags)
 * @method static \Illuminate\Database\Eloquent\Builder|HotelMetaData withoutTags(\ArrayAccess|\Spatie\Tags\Tag|array|string $tags, ?string $type = null)
 *
 * @mixin \Eloquent
 */
class HotelMetaData extends Model implements HasMedia
{
    use HasFactory;
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
        return $this->belongsTo(TipoDeImovel::class);
    }

    public function condicao(): BelongsTo
    {
        return $this->belongsTo(Condicao::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function bairro(): BelongsTo
    {
        return $this->belongsTo(
            Bairro::class
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
        $this->addMediaCollection('main_hotels')->withResponsiveImages()->singleFile();
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
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
