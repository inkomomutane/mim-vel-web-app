<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Denuncia
 *
 * @property int $id
 * @property string|null $denuncia
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|DenuniasImovel[] $denunias_imovels
 *
 * @package App\Models
 */
class Denuncia extends Model
{
	protected $table = 'denuncias';

	protected $fillable = [
		'denuncia'
	];

	public function denunias_imovels()
	{
		return $this->hasMany(DenuniasImovel::class);
	}
}
