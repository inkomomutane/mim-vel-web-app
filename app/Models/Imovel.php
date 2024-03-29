<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Data\ImovelData;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Pricecurrent\LaravelEloquentFilters\Filterable;
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

/**
 * App\Models\Imovel
 *
 * @property int $id
 * @property string|null $titulo
 * @property string|null $descricao
 * @property int|null $banheiros
 * @property float|null $preco
 * @property int|null $ano
 * @property int|null $andares
 * @property float|null $area
 * @property int|null $quartos
 * @property int|null $suites
 * @property int|null $garagens
 * @property int|null $piscinas
 * @property string|null $endereco
 * @property string|null $mapa
 * @property string|null $published_at
 * @property Collection<int, \CyrildeWit\EloquentViewable\View> $views
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $bairro_id
 * @property int $condicao_id
 * @property int $tipo_de_imovel_id
 * @property int $status_id
 * @property int $corretor_id
 * @property string|null $slug
 * @property bool $for_rent
 * @property int|null $regra_de_negocio_id
 * @property int|null $imovel_for_id
 * @property int $intermediation_rule_id
 * @property string|null $details
 * @property Carbon|null $deleted_at
 * @property bool $approved
 * @property int|null $approved_by_id
 * @property string|null $approved_at
 * @property-read \App\Models\Bairro $bairro
 * @property-read Collection<int, \App\Models\Comentario> $comentarios
 * @property-read int|null $comentarios_count
 * @property-read \App\Models\Condicao $condicao
 * @property-read \App\Models\User $corretor
 * @property-read mixed $price
 * @property-read \App\Models\ImovelFor|null $imovelFor
 * @property-read \App\Models\IntermediationRule|null $intermediationRule
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read Collection<int, \App\Models\Rating> $ratings
 * @property-read int|null $ratings_count
 * @property-read \App\Models\RegraDeNegocio|null $regraDeNegocio
 * @property-read \RalphJSmit\Laravel\SEO\Models\SEO $seo
 * @property Collection<int, \Spatie\Tags\Tag> $tags
 * @property-read \App\Models\Status $status
 * @property-read int|null $tags_count
 * @property-read \App\Models\TipoDeImovel $tipo_de_imovel
 * @property-read int|null $views_count
 * @method static \Database\Factories\ImovelFactory factory($count = null, $state = [])
 * @method static Builder|Imovel filter(\Pricecurrent\LaravelEloquentFilters\EloquentFilters $filters)
 * @method static Builder|Imovel newModelQuery()
 * @method static Builder|Imovel newQuery()
 * @method static Builder|Imovel onlyTrashed()
 * @method static Builder|Imovel orderByUniqueViews(string $direction = 'desc', $period = null, ?string $collection = null, string $as = 'unique_views_count')
 * @method static Builder|Imovel orderByViews(string $direction = 'desc', ?\CyrildeWit\EloquentViewable\Support\Period $period = null, ?string $collection = null, bool $unique = false, string $as = 'views_count')
 * @method static Builder|Imovel query()
 * @method static Builder|Imovel whereAndares($value)
 * @method static Builder|Imovel whereAno($value)
 * @method static Builder|Imovel whereApproved($value)
 * @method static Builder|Imovel whereApprovedAt($value)
 * @method static Builder|Imovel whereApprovedById($value)
 * @method static Builder|Imovel whereArea($value)
 * @method static Builder|Imovel whereBairroId($value)
 * @method static Builder|Imovel whereBanheiros($value)
 * @method static Builder|Imovel whereCondicaoId($value)
 * @method static Builder|Imovel whereCorretorId($value)
 * @method static Builder|Imovel whereCreatedAt($value)
 * @method static Builder|Imovel whereDeletedAt($value)
 * @method static Builder|Imovel whereDescricao($value)
 * @method static Builder|Imovel whereDetails($value)
 * @method static Builder|Imovel whereEndereco($value)
 * @method static Builder|Imovel whereForRent($value)
 * @method static Builder|Imovel whereGaragens($value)
 * @method static Builder|Imovel whereId($value)
 * @method static Builder|Imovel whereImovelForId($value)
 * @method static Builder|Imovel whereIntermediationRuleId($value)
 * @method static Builder|Imovel whereMapa($value)
 * @method static Builder|Imovel wherePiscinas($value)
 * @method static Builder|Imovel wherePreco($value)
 * @method static Builder|Imovel wherePublishedAt($value)
 * @method static Builder|Imovel whereQuartos($value)
 * @method static Builder|Imovel whereRegraDeNegocioId($value)
 * @method static Builder|Imovel whereSlug($value)
 * @method static Builder|Imovel whereStatusId($value)
 * @method static Builder|Imovel whereSuites($value)
 * @method static Builder|Imovel whereTipoDeImovelId($value)
 * @method static Builder|Imovel whereTitulo($value)
 * @method static Builder|Imovel whereUpdatedAt($value)
 * @method static Builder|Imovel whereViews($value)
 * @method static Builder|Imovel withAllTags(\ArrayAccess|\Spatie\Tags\Tag|array|string $tags, ?string $type = null)
 * @method static Builder|Imovel withAllTagsOfAnyType($tags)
 * @method static Builder|Imovel withAnyTags(\ArrayAccess|\Spatie\Tags\Tag|array|string $tags, ?string $type = null)
 * @method static Builder|Imovel withAnyTagsOfAnyType($tags)
 * @method static Builder|Imovel withApproved()
 * @method static Builder|Imovel withTrashed()
 * @method static Builder|Imovel withViewsCount(?\CyrildeWit\EloquentViewable\Support\Period $period = null, ?string $collection = null, bool $unique = false, string $as = 'views_count')
 * @method static Builder|Imovel withoutApproved()
 * @method static Builder|Imovel withoutTags(\ArrayAccess|\Spatie\Tags\Tag|array|string $tags, ?string $type = null)
 * @method static Builder|Imovel withoutTrashed()
 * @mixin \Eloquent
 */
class Imovel extends Model implements HasMedia, Searchable, Sitemapable, Viewable
{
    use Filterable;
    use HasFactory;
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
        return $this->belongsTo(Bairro::class);
    }

    public function regraDeNegocio()
    {
        return $this->belongsTo(RegraDeNegocio::class);
    }

    public function condicao()
    {
        return $this->belongsTo(Condicao::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function tipo_de_imovel()
    {
        return $this->belongsTo(TipoDeImovel::class);
    }

    public function corretor()
    {
        return $this->belongsTo(User::class, 'corretor_id');
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
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
        return $this->belongsTo(ImovelFor::class);
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
        return Imovel::where('tipo_de_imovel_id', $this->tipo_de_imovel_id)
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
