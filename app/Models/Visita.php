<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Visita
 * 
 * @property int $id
 * @property string|null $ip
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Visita extends Model
{
	protected $table = 'visitas';

	protected $fillable = [
		'ip'
	];
}
