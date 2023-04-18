<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Agenda
 *
 * @property int $id
 * @property string|null $nome_do_cliente
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $local
 * @property string|null $contacto
 * @property Carbon|null $data_hora
 * @property int $corretor_id
 *
 * @property User $user
 *
 * @package App\Models
 */
class Agenda extends Model
{
    use HasFactory;
	protected $table = 'agendas';

	protected $casts = [
		'corretor_id' => 'int',
        'imovel_id' => 'int'
	];

	protected $dates = [
		'data_hora'
	];

	protected $fillable = [
		'nome_do_cliente',
        'mensagem',
        'email',
		'contacto',
		'data_hora',
		'corretor_id',
        'imovel_id'
	];

	public function corretor()
	{
		return $this->belongsTo(User::class, 'corretor_id');
	}
}
