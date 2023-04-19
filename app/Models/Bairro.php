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
 * Class Bairro
 *
 * @property int $id
 * @property string|null $nome
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $cidade_id
 * @property Cidade $cidade
 * @property Collection|Imovel[] $imovels
 * @package App\Models
 * @property-read int|null $imovels_count
 * @method static \Illuminate\Database\Eloquent\Builder|Bairro newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bairro newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bairro query()
 * @method static \Illuminate\Database\Eloquent\Builder|Bairro whereCidadeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bairro whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bairro whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bairro whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bairro whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Bairro extends Model
{
    use HasFactory;
	protected $table = 'bairros';

	protected $casts = [
		'cidade_id' => 'int'
	];

	protected $fillable = [
		'nome',
		'cidade_id'
	];

	public function cidade()
	{
		return $this->belongsTo(Cidade::class);
	}

	public function imovels()
	{
		return $this->hasMany(Imovel::class);
	}
}
