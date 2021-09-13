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
 * @property string|null $ip
 * @property string|null $comentario
 * @property int|null $imovel_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $nome
 * 
 * @property Imovel|null $imovel
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
		'ip',
		'comentario',
		'imovel_id',
		'nome'
	];

	public function imovel()
	{
		return $this->belongsTo(Imovel::class);
	}
}
