<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DenuniasImovel
 * 
 * @property int $id
 * @property int|null $denuncia_id
 * @property int|null $imovel_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Denuncia|null $denuncia
 * @property Imovel|null $imovel
 *
 * @package App\Models
 */
class DenuniasImovel extends Model
{
	protected $table = 'denunias_imovels';

	protected $casts = [
		'denuncia_id' => 'int',
		'imovel_id' => 'int'
	];

	protected $fillable = [
		'denuncia_id',
		'imovel_id'
	];

	public function denuncia()
	{
		return $this->belongsTo(Denuncia::class);
	}

	public function imovel()
	{
		return $this->belongsTo(Imovel::class);
	}
}
