<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Visit
 * 
 * @property int $id
 * @property string $primary_key
 * @property string|null $secondary_key
 * @property int $score
 * @property array|null $list
 * @property Carbon|null $expired_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Visit extends Model
{
	protected $table = 'visits';

	protected $casts = [
		'score' => 'int',
		'list' => 'json'
	];

	protected $dates = [
		'expired_at'
	];

	protected $fillable = [
		'primary_key',
		'secondary_key',
		'score',
		'list',
		'expired_at'
	];
}
