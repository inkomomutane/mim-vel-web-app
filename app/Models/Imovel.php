<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;

/**
 * Class Imovel
 *
 * @property int $id
 * @property string|null $titulo
 * @property string|null $descricao
 * @property int|null $banheiros
 * @property float|null $preco
 * @property Carbon|null $ano
 * @property int|null $andar
 * @property float|null $area
 * @property int|null $quartos
 * @property int|null $suites
 * @property int|null $garagens
 * @property int|null $piscinas
 * @property string|null $endereco
 * @property string|null $mapa
 * @property bool|null $published
 * @property int|null $condicao_id
 * @property int|null $bairro_id
 * @property int|null $tipo_de_imovel_id
 * @property int|null $status_id
 * @property int|null $views
 * @property float|null $rating
 * @property int|null $postado_por
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @property Bairro|null $bairro
 * @property Condicao|null $condicao
 * @property Status|null $status
 * @property TipoDeImovel|null $tipo_de_imovel
 * @property User|null $user
 * @property Collection|Comentario[] $comentarios
 * @property Collection|DenuniasImovel[] $denunias_imovels
 * @property Collection|UsersRating[] $users_ratings
 *
 * @package App\Models
 */
class Imovel extends Model
{
	use SoftDeletes,SearchableTrait;
	protected $table = 'imovels';

	protected $casts = [
		'banheiros' => 'int',
		'preco' => 'float',
		'andar' => 'int',
		'area' => 'float',
		'quartos' => 'int',
		'suites' => 'int',
		'garagens' => 'int',
		'piscinas' => 'int',
		'published' => 'bool',
		'condicao_id' => 'int',
		'bairro_id' => 'int',
		'tipo_de_imovel_id' => 'int',
		'status_id' => 'int',
		'views' => 'int',
		'rating' => 'float',
		'postado_por' => 'int'
	];

	protected $dates = [
		'ano'
	];



	protected $fillable = [
		'titulo',
		'descricao',
		'banheiros',
		'preco',
		'ano',
		'andar',
		'area',
		'quartos',
        'codigo',
		'suites',
		'garagens',
		'piscinas',
		'endereco',
		'mapa',
		'published',
		'condicao_id',
		'bairro_id',
		'tipo_de_imovel_id',
		'status_id',
		'views',
		'rating',
		'postado_por'
	];




        /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'imovels.titulo'=> 10,
            'imovels.descricao'=> 6,
            'imovels.banheiros'=> 1,
            'imovels.preco'=> 10,
            'imovels.codigo' =>9,
            'imovels.ano'=> 10,
            'imovels.andar'=> 5,
            'imovels.area'=> 5,
            'imovels.quartos'=> 8,
            'imovels.suites'=> 7,
            'imovels.garagens'=> 3,
            'imovels.piscinas'=> 3,
            'imovels.endereco'=> 10,
            'imovels.postado_por'=> 4,
            'bairros.nome'=>10,
            'condicaos.nome'=>10,
            'statuses.nome'=>10,
            'tipo_de_imovels.nome' => 8,
        ],
        'joins' => [
            'bairros' => ['imovels.bairro_id','bairros.id'],
            'condicaos' => ['imovels.condicao_id','condicaos.id'],
            'statuses' => ['imovels.status_id','statuses.id'],
            'tipo_de_imovels' => ['imovels.tipo_de_imovel_id','tipo_de_imovels.id'],
        ],
    ];

	public function bairro()
	{
		return $this->belongsTo(Bairro::class);
	}
    public function bairros()
	{
		return $this->belongsTo(Bairro::class);
	}
	public function condicao()
	{
		return $this->belongsTo(Condicao::class);
	}
    public function condicaos()
	{
		return $this->belongsTo(Condicao::class);
	}

	public function status()
	{
		return $this->belongsTo(Status::class);
	}
    public function statuses()
	{
		return $this->belongsTo(Status::class);
	}

	public function tipo_de_imovel()
	{
		return $this->belongsTo(TipoDeImovel::class);
	}
    public function tipo_de_imovels()
	{
		return $this->belongsTo(TipoDeImovel::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'postado_por');
	}

	public function comentarios()
	{
		return $this->hasMany(Comentario::class);
	}

    public function agendas()
	{
		return $this->hasMany(Agenda::class);
	}


	public function denunias_imovels()
	{
		return $this->hasMany(DenuniasImovel::class);
	}

	public function users_ratings()
	{
		return $this->hasMany(UsersRating::class, 'imovels_id');
	}

    public function fotos()
    {
        return $this->morphMany('App\Models\Foto', 'fotable');
    }

    public function videos()
    {
        return $this->morphMany('App\Models\Video', 'videoble');
    }
    public function vzt()
    {
        return visits($this);
    }
    public function visits()
    {
        return visits($this)->relation();
    }




}
