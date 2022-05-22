<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Rating
 * 
 * @property int $id
 * @property float|null $rating
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $ip
 * @property string|null $nome
 * @property int $imovel_id
 * 
 * @property Imovel $imovel
 *
 * @package App\Models
 */
class Rating extends Model
{
	protected $table = 'ratings';

	protected $casts = [
		'rating' => 'float',
		'imovel_id' => 'int'
	];

	protected $fillable = [
		'rating',
		'ip',
		'nome',
		'imovel_id'
	];

	public function imovel()
	{
		return $this->belongsTo(Imovel::class);
	}
}
