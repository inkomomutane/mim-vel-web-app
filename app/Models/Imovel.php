<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use RalphJSmit\Laravel\SEO\Support\ImageMeta;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Tags\HasTags;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

/**
 * Class Imovel
 *
 * @property int $id
 * @property string|null $titulo
 * @property string|null $descricao
 * @property int|null $banheiros
 * @property float|null $preco
 * @property Carbon|null $ano
 * @property int|null $andares
 * @property float|null $area
 * @property int|null $quartos
 * @property int|null $suites
 * @property int|null $garagens
 * @property int|null $piscinas
 * @property string|null $endereco
 * @property string|null $mapa
 * @property Carbon|null $published_at
 * @property int|null $views
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $bairro_id
 * @property int $condicao_id
 * @property int $tipo_de_imovel_id
 * @property int $status_id
 * @property int $corretor_id
 *
 * @property Bairro $bairro
 * @property Condicao $condicao
 * @property Status $status
 * @property TipoDeImovel $tipo_de_imovel
 * @property User $user
 * @property Collection|Comentario[] $comentarios
 * @property Collection|Rating[] $ratings
 *
 * @package App\Models
 */
class Imovel extends Model implements HasMedia, Searchable
{
    use InteractsWithMedia, HasTags, HasSlug, HasSEO, HasFactory;

    protected $table = 'imovels';

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
        'corretor_id' => 'int'
    ];

    protected $dates = [
        'published_at'
    ];

    protected $fillable = [
        'titulo',
        'descricao',
        'slug',
        'banheiros',
        'preco',
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
        'imovel_for_id'
    ];

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

        $this->addMediaCollection('posts');
    }



    public function getDynamicSEOData(): SEOData
    {
        return new SEOData(
            title: $this->titulo,
            description: strip_tags($this->descricao),
            author: $this->corretor->name,
            image: $this->hasMedia('posts') ? $this->getFirstMedia('posts')->getUrl('social-media') : null,
            type: 'article',
            published_time: $this->published_at,
            modified_time: $this->updated_at,
            imageMeta: $this->hasMedia('posts') ? new ImageMeta($this->getFirstMedia('posts')->getUrl('social-media')) : null,
        );
    }

    public function isForRent(): bool
    {
        return $this->for_rent  == true;
    }

    public function imovelFor()
    {
        return $this->belongsTo(ImovelFor::class);
    }

    public function stars(): int
    {
        return (int) $this->ratings->avg('rating');
    }

    public function vzt()
    {
        return visits($this);
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
        return Imovel::
            where('tipo_de_imovel_id',$this->tipo_de_imovel_id)
            ->orWhere('regra_de_negocio_id',$this->regra_de_negocio_id)
            ->orWhere('imovel_for_id',$this->imovel_for_id)
            ->orWhere('condicao_id',$this->condicao_id)
            ->with('ratings')
            ->with('tipo_de_imovel')
            ->with('bairro')
            ->with('condicao')
            ->with('comentarios')
            ->with('media')
            ->with('corretor')
            ->get()
            ->where('id','<>',$this->id)
            ->take(10);
    }
}
