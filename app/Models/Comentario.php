<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Comentario
 * 
 * @property int $id
 * @property string|null $comentario
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $nome
 * @property string|null $ip
 * @property int $imovel_id
 * 
 * @property Imovel $imovel
 *
 * @package App\Models
 */
class Comentario extends Model
{
	protected $table = 'comentarios';

	protected $casts = [
		'imovel_id' => 'int'
	];

	protected $fillable = [
		'comentario',
		'nome',
		'ip',
		'imovel_id'
	];

	public function imovel()
	{
		return $this->belongsTo(Imovel::class);
	}
}
