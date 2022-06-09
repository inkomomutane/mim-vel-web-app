<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cidade
 *
 * @property int $id
 * @property string|null $nome
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|Bairro[] $bairros
 *
 * @package App\Models
 */
class Cidade extends Model
{
    use HasFactory;
    
	protected $table = 'cidades';

	protected $fillable = [
		'nome'
	];

	public function bairros()
	{
		return $this->hasMany(Bairro::class);
	}
}
