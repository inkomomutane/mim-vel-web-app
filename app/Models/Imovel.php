<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Imovel
 *
 * @property int $id
 * @property string|null $descricao
 * @property float|null $preco
 * @property Carbon|null $ano
 * @property int|null $andar
 * @property float|null $area
 * @property int|null $quartos
 * @property int|null $suites
 * @property int|null $garagens
 * @property int|null $pcinas
 * @property string|null $endereco
 * @property string|null $mapa
 * @property int|null $condicao_id
 * @property int|null $bairro_id
 * @property int|null $cidade_id
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
 * @property Cidade|null $cidade
 * @property Condicao|null $condicao
 * @property Status|null $status
 * @property TipoDeImovel|null $tipo_de_imovel
 * @property User|null $user
 * @property Collection|Comentario[] $comentarios
 * @property Collection|DenuniasImovel[] $denunias_imovels
 * @property Collection|Foto[] $fotos
 * @property Collection|Video[] $videos
 *
 * @package App\Models
 */
class Imovel extends Model
{
	use SoftDeletes;
	protected $table = 'imovels';

	protected $casts = [
		'preco' => 'float',
		'andar' => 'int',
		'area' => 'float',
		'quartos' => 'int',
		'suites' => 'int',
		'garagens' => 'int',
		'pcinas' => 'int',
		'condicao_id' => 'int',
		'bairro_id' => 'int',
		'cidade_id' => 'int',
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
		'descricao',
		'preco',
		'ano',
		'andar',
		'area',
		'quartos',
		'suites',
		'garagens',
		'pcinas',
		'endereco',
		'mapa',
		'condicao_id',
		'bairro_id',
		'cidade_id',
		'tipo_de_imovel_id',
		'status_id',
		'views',
		'rating',
		'postado_por'
	];

	public function bairro()
	{
		return $this->belongsTo(Bairro::class);
	}

	public function cidade()
	{
		return $this->belongsTo(Cidade::class);
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

	public function user()
	{
		return $this->belongsTo(User::class, 'postado_por');
	}

	public function comentarios()
	{
		return $this->hasMany(Comentario::class);
	}

	public function denunias_imovels()
	{
		return $this->hasMany(DenuniasImovel::class);
	}

	public function fotos()
	{
		return $this->hasMany(Foto::class);
	}

	public function videos()
	{
		return $this->hasMany(Video::class);
	}
}
