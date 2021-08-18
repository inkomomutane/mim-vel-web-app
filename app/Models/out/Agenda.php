<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Agenda
 * 
 * @property int $id
 * @property string|null $nome_cliente
 * @property string|null $contacto
 * @property Carbon|null $horario
 * @property string|null $local_de_encontro
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $corretor_id
 * 
 * @property User|null $user
 *
 * @package App\Models
 */
class Agenda extends Model
{
	protected $table = 'agendas';

	protected $casts = [
		'corretor_id' => 'int'
	];

	protected $dates = [
		'horario'
	];

	protected $fillable = [
		'nome_cliente',
		'contacto',
		'horario',
		'local_de_encontro',
		'corretor_id'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'corretor_id');
	}
}
