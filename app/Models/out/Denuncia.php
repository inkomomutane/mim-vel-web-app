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
 * @property string|null $nome_do_denunciante
 * @property bool|null $anonimo
 * @property string|null $email
 * @property string|null $contacto
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

	protected $casts = [
		'anonimo' => 'bool'
	];

	protected $fillable = [
		'denuncia',
		'nome_do_denunciante',
		'anonimo',
		'imovel_url',
		'contacto',
        'email'
	];
}
