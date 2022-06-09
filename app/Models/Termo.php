<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Termo
 * 
 * @property int $id
 * @property string|null $termos
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Termo extends Model
{
	protected $table = 'termos';

	protected $fillable = [
		'termos'
	];
}
