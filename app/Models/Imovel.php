<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Data\ImovelData;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use NumberFormatter;
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
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Tags\HasTags;

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
 * @property int|null $views
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
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
 * @property-read \App\Models\Bairro $bairro
 * @property-read Collection<int, \App\Models\Comentario> $comentarios
 * @property-read int|null $comentarios_count
 * @property-read \App\Models\Condicao $condicao
 * @property-read \App\Models\User $corretor
 * @property-read float $price
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
 *
 * @method static \Database\Factories\ImovelFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Imovel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Imovel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Imovel orderByUniqueViews(string $direction = 'desc', $period = null, ?string $collection = null, string $as = 'unique_views_count')
 * @method static \Illuminate\Database\Eloquent\Builder|Imovel orderByViews(string $direction = 'desc', ?\CyrildeWit\EloquentViewable\Support\Period $period = null, ?string $collection = null, bool $unique = false, string $as = 'views_count')
 * @method static \Illuminate\Database\Eloquent\Builder|Imovel query()
 * @method static \Illuminate\Database\Eloquent\Builder|Imovel whereAndares($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Imovel whereAno($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Imovel whereArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Imovel whereBairroId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Imovel whereBanheiros($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Imovel whereCondicaoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Imovel whereCorretorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Imovel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Imovel whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Imovel whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Imovel whereEndereco($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Imovel whereForRent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Imovel whereGaragens($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Imovel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Imovel whereImovelForId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Imovel whereIntermediationRuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Imovel whereMapa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Imovel wherePiscinas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Imovel wherePreco($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Imovel wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Imovel whereQuartos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Imovel whereRegraDeNegocioId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Imovel whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Imovel whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Imovel whereSuites($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Imovel whereTipoDeImovelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Imovel whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Imovel whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Imovel whereViews($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Imovel withAllTags(\ArrayAccess|\Spatie\Tags\Tag|array|string $tags, ?string $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Imovel withAllTagsOfAnyType($tags)
 * @method static \Illuminate\Database\Eloquent\Builder|Imovel withAnyTags(\ArrayAccess|\Spatie\Tags\Tag|array|string $tags, ?string $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Imovel withAnyTagsOfAnyType($tags)
 * @method static \Illuminate\Database\Eloquent\Builder|Imovel withViewsCount(?\CyrildeWit\EloquentViewable\Support\Period $period = null, ?string $collection = null, bool $unique = false, string $as = 'views_count')
 * @method static \Illuminate\Database\Eloquent\Builder|Imovel withoutTags(\ArrayAccess|\Spatie\Tags\Tag|array|string $tags, ?string $type = null)
 *
 * @property \Illuminate\Support\Carbon $deleted_at
 * @property-read Collection<int, \App\Models\Comentario> $comentarios
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, Media> $media
 * @property-read Collection<int, \App\Models\Rating> $ratings
 * @property Collection<int, \Spatie\Tags\Tag> $tags
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Imovel onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Imovel whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Imovel withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Imovel withoutTrashed()
 *
 * @property-read Collection<int, \App\Models\Comentario> $comentarios
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, Media> $media
 * @property-read Collection<int, \App\Models\Rating> $ratings
 * @property Collection<int, \Spatie\Tags\Tag> $tags
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Imovel filter(\Pricecurrent\LaravelEloquentFilters\EloquentFilters $filters)
 *
 * @mixin \Eloquent
 */
class Imovel extends Model implements HasMedia, Searchable, Viewable
{
    use InteractsWithMedia;
    use HasTags;
    use HasSlug;
    use HasSEO;
    use HasFactory;
    use WithData;
    use InteractsWithViews;
    use SoftDeletes;
    use Filterable;

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
    ];

    public function getPriceAttribute()
    {
        return (new NumberFormatter('MZ', NumberFormatter::CURRENCY))->formatCurrency($this->preco, 'MZN');
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
            type: 'article',
            canonical_url: route('post.imovel.show', ['imovel' => $this->slug]),
            published_time: $this->created_at,
            modified_time: $this->updated_at,
            section: Str::Ucfirst($this->tipo_de_imovel->nome ?? ''),
            imageMeta: $this->hasMedia('posts') ? new ImageMeta($this->getFirstMedia('posts')->getUrl('social-media')) : null,
            schema: SchemaCollection::initialize()->addArticle()->addBreadcrumbs(
                function (BreadcrumbListSchema $breadcrumbs): BreadcrumbListSchema {
                    return $breadcrumbs->prependBreadcrumbs([
                        'Homepage' => route('welcome'),
                    ]);
                }
            ),
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
            ->take(6);
    }
}
