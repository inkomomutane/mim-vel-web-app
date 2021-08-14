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
 * @property int|null $imovel_id
 * @property int|null $author_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Imovel|null $imovel
 * @property User|null $user
 *
 * @package App\Models
 */
class Comentario extends Model
{
	protected $table = 'comentarios';

	protected $casts = [
		'imovel_id' => 'int',
		'author_id' => 'int'
	];

	protected $fillable = [
		'comentario',
		'imovel_id',
		'author_id'
	];

	public function imovel()
	{
		return $this->belongsTo(Imovel::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'author_id');
	}
}
