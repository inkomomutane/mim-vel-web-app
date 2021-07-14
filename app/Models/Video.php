<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Video
 * 
 * @property int $id
 * @property string|null $url
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $imovel_id
 * 
 * @property Imovel|null $imovel
 *
 * @package App\Models
 */
class Video extends Model
{
	protected $table = 'videos';

	protected $casts = [
		'imovel_id' => 'int'
	];

	protected $fillable = [
		'url',
		'imovel_id'
	];

	public function imovel()
	{
		return $this->belongsTo(Imovel::class);
	}
}
