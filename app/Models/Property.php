<?php

namespace App\Models;

use App\Data\CardPropertyData;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use RalphJSmit\Laravel\SEO\Schema\BreadcrumbListSchema;
use RalphJSmit\Laravel\SEO\SchemaCollection;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use RalphJSmit\Laravel\SEO\Support\ImageMeta;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use Spatie\LaravelData\WithData;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Tags\HasTags;
use Vite;

class Property extends Model implements HasMedia, Sitemapable, Viewable
{
    use HasSEO;
    use HasSlug;
    use HasTags;
    use InteractsWithMedia;
    use InteractsWithViews;
    use SoftDeletes;
    use WithData;

    protected string $dataClass = CardPropertyData::class;

    protected bool $removeViewsOnDelete = true;

    protected $casts = [
        'bathrooms' => 'int',
        'price' => 'float',
        'year' => 'int',
        'floors' => 'int',
        'area' => 'float',
        'bedrooms' => 'int',
        'for_rent' => 'bool',
        'suites' => 'int',
        'garages' => 'int',
        'pools' => 'int',
        'views' => 'int',

        'neighborhood_id' => 'int',
        'property_condition_id' => 'int',
        'property_type_id' => 'int',
        'status_id' => 'int',
        'broker_id' => 'int',
        'business_rule_id' => 'int',
        'property_for_id' => 'int',
        'intermediation_rule_id' => 'int',

        'approved' => 'bool',
        'approved_by_id' => 'int',

        'published_at' => 'datetime',
        'approved_at' => 'datetime',
    ];

    protected $fillable = [
        'title',
        'price',
        'description',
        'slug',

        'bathrooms',
        'year',
        'floors',
        'area',
        'bedrooms',
        'suites',
        'garages',
        'pools',

        'address',
        'map',

        'for_rent',
        'published_at',
        'views',

        'neighborhood_id',
        'property_condition_id',
        'property_type_id',
        'status_id',
        'broker_id',
        'business_rule_id',
        'property_for_id',
        'intermediation_rule_id',

        'details',

        'approved',
        'approved_by_id',
        'approved_at',
    ];

    public function neighborhood(): BelongsTo
    {
        return $this->belongsTo(
            Neighborhood::class,
        );
    }

    public function businessRule(): BelongsTo
    {
        return $this->belongsTo(
            BusinessRule::class,
        );
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
        return $this->belongsTo(
            Status::class,
        );
    }

    public function propertyType(): BelongsTo
    {
        return $this->belongsTo(
            PropertyType::class,
        );
    }

    public function broker(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'broker_id',
        );
    }

    public function comments(): HasMany
    {
        return $this->hasMany(
            Comment::class,
        );
    }

    public function ratings(): HasMany
    {
        return $this->hasMany(
            Rating::class,
        );
    }

    public function intermediationRule(): BelongsTo
    {
        return $this->belongsTo(
            IntermediationRule::class,
        );
    }

    public function propertyFor(): BelongsTo
    {
        return $this->belongsTo(
            PropertyFor::class,
        );
    }

    public function approvedBy(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'approved_by_id',
        );
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom([
                'title',
            ])
            ->saveSlugsTo('slug');
    }

    public function toSitemapTag(): Url|string|array
    {
        return Url::create(
            route(
                'post.imovel.show',
                $this,
            ),
        )
            ->setLastModificationDate(
                $this->updated_at,
            )
            ->setChangeFrequency(
                Url::CHANGE_FREQUENCY_YEARLY,
            )
            ->addImage(
                $this->hasMedia('posts')
                    ? $this
                    ->getFirstMedia('posts')
                    ->getUrl('social-media')
                    : Vite::asset(
                    'resources/js/images/placeholder.svg',
                ),
            )
            ->setPriority(0.1);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
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
        $this->addMediaCollection('posts')
            ->withResponsiveImages();
    }

    public function getDynamicSEOData(): SEOData
    {
        $socialMediaImage = $this->hasMedia('posts')
            ? $this
                ->getFirstMedia('posts')
                ?->getUrl('social-media')
            : null;

        return new SEOData(
            title: Str::ucfirst(
                (string) $this->title,
            ),

            description: Str::ucfirst(
                strip_tags(
                    (string) $this->description,
                ),
            ),

            author: Str::ucfirst(
                (string) $this->broker?->name,
            ),

            image: $socialMediaImage,

            imageMeta: $socialMediaImage
                ? new ImageMeta(
                    $socialMediaImage,
                )
                : null,

            published_time: $this->created_at,

            modified_time: $this->updated_at,

            section: Str::ucfirst(
                (string) $this->propertyType?->name,
            ),

            schema: SchemaCollection::initialize()
                ->addArticle()
                ->addBreadcrumbs(
                    fn (
                        BreadcrumbListSchema $breadcrumbs,
                    ): BreadcrumbListSchema => $breadcrumbs
                        ->prependBreadcrumbs([
                            'Homepage' => route('welcome'),
                        ]),
                ),

            type: 'article',

            canonical_url: route(
                'post.imovel.show',
                [
                    'imovel' => $this->slug,
                ],
            ),
        );
    }

    public function isForRent(): bool
    {
        return $this->for_rent === true;
    }

    public function stars(): int
    {
        return (int) $this
            ->ratings
            ->avg('rating');
    }

    public function scopeWithApproved(
        Builder $builder,
    ): void {
        $builder->where(
            'approved',
            true,
        );
    }

    public function scopeWithoutApproved(
        Builder $builder,
    ): void {
        $builder
            ->withoutGlobalScope(
                'withApproved',
            )
            ->where(
                'approved',
                false,
            );
    }
}
