<?php

namespace App\Models;

use App\Data\ImovelData;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
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
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Tags\HasTags;
use Vite;


class Property extends Model implements HasMedia, Searchable, Sitemapable, Viewable
{
    use HasSEO;
    use HasSlug;
    use HasTags;
    use InteractsWithMedia;
    use InteractsWithViews;
    use SoftDeletes;
    use WithData;

    protected $table = 'imovels';

    protected $dataClass = ImovelData::class;

    protected $removeViewsOnDelete = true;

    protected $append = [
        'price',
    ];

    protected $casts = [
        'banheiros' => 'int',
        'preco' => 'float',
        'andares' => 'int',
        'area' => 'float',
        'quartos' => 'int',
        'for_rent' => 'bool',
        'suites' => 'int',
        'garagens' => 'int',
        'piscinas' => 'int',
        'views' => 'int',
        'bairro_id' => 'int',
        'condicao_id' => 'int',
        'tipo_de_imovel_id' => 'int',
        'status_id' => 'int',
        'corretor_id' => 'int',
        'price' => 'float',
        'approved' => 'bool',
    ];

    protected $dates = [
        'published_at',
    ];

    protected $fillable = [
        'titulo',
        'preco',
        'descricao',
        'slug',
        'banheiros',
        'ano',
        'andares',
        'for_rent',
        'area',
        'quartos',
        'suites',
        'garagens',
        'piscinas',
        'endereco',
        'mapa',
        'published_at',
        'views',
        'bairro_id',
        'condicao_id',
        'tipo_de_imovel_id',
        'status_id',
        'corretor_id',
        'regra_de_negocio_id',
        'imovel_for_id',
        'intermediation_rule_id',
        'approved',
        'approved_by_id',
        'approved_at',
    ];

    public function getPriceAttribute()
    {
        return Str::currencyFormat($this->preco, 'MZN ', 2);
    }

    public function bairro()
    {
        return $this->belongsTo(Neighborhood::class);
    }

    public function regraDeNegocio()
    {
        return $this->belongsTo(BusinessRule::class);
    }

    public function condicao()
    {
        return $this->belongsTo(PropertyCondition::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function tipo_de_imovel()
    {
        return $this->belongsTo(PropertyType::class);
    }

    public function corretor()
    {
        return $this->belongsTo(User::class, 'corretor_id');
    }

    public function comentarios()
    {
        return $this->hasMany(Comment::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function intermediationRule()
    {
        return $this->belongsTo(IntermediationRule::class);
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['titulo'])
            ->saveSlugsTo('slug');
    }

    public function toSitemapTag(): Url|string|array
    {
        return Url::create(route('post.imovel.show', $this))
            ->setLastModificationDate(Carbon::create($this->updated_at))
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
            ->addImage($this->hasMedia('posts') ? $this->getFirstMedia('posts')->getUrl('social-media') : Vite::asset('resources/js/images/placeholder.svg'))
            ->setPriority(0.1);
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
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
        $this->addMediaCollection('posts')->withResponsiveImages();
    }

    public function getDynamicSEOData(): SEOData
    {

        return new SEOData(
            title: Str::Ucfirst($this->titulo),
            description: Str::Ucfirst(strip_tags($this->descricao)),
            author: Str::Ucfirst($this->corretor->name),
            image: $this->hasMedia('posts') ? $this->getFirstMedia('posts')->getUrl('social-media') : null,
            imageMeta: $this->hasMedia('posts') ? new ImageMeta($this->getFirstMedia('posts')->getUrl('social-media')) : null,
            published_time: $this->created_at,
            modified_time: $this->updated_at,
            section: Str::Ucfirst($this->tipo_de_imovel->nome ?? ''),
            schema: SchemaCollection::initialize()->addArticle()->addBreadcrumbs(
                fn (BreadcrumbListSchema $breadcrumbs): BreadcrumbListSchema => $breadcrumbs->prependBreadcrumbs([
                    'Homepage' => route('welcome'),
                ])
            ),
            type: 'article',
            canonical_url: route('post.imovel.show', ['imovel' => $this->slug]),
        );
    }

    public function isForRent(): bool
    {
        return $this->for_rent == true;
    }

    public function imovelFor()
    {
        return $this->belongsTo(PropertyFor::class);
    }

    public function stars(): int
    {
        return (int) $this->ratings->avg('rating');
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('posts.show', $this->slug);

        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->titulo,
            $url
        );
    }

    public function relectedImovels()
    {
        return Property::where('tipo_de_imovel_id', $this->tipo_de_imovel_id)
            ->with('ratings')
            ->with('tipo_de_imovel')
            ->with('bairro.cidade')
            ->with('condicao')
            ->with('comentarios')
            ->with('media')
            ->with(['corretor', 'imovelFor', 'status'])
            ->get()
            ->where('id', '<>', $this->id)
            ->take(4);
    }

    /**
     * Scope a query to only include popular users.
     */
    public function scopeWithApproved(Builder $builder): void
    {
        $builder->where('approved', '=', true);
    }

    /**
     * Scope a query to only include popular users.
     */
    public function scopeWithoutApproved(Builder $builder): void
    {
        $builder->withoutGlobalScope('withApproved')
            ->where('approved', '=', false);
    }
}
