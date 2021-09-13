<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoDeImovel
 * 
 * @property int $id
 * @property string|null $nome
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Imovel[] $imovels
 *
 * @package App\Models
 */
class TipoDeImovel extends Model
{
	protected $table = 'tipo_de_imovels';

	protected $fillable = [
		'nome'
	];

	public function imovels()
	{
		return $this->hasMany(Imovel::class);
	}
}
