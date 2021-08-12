<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Message
 *
 * @property int $from_id
 * @property int $to_id
 * @property int $id
 * @property string|null $message
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property User $user
 *
 * @package App\Models
 */
class Message extends Model
{
	protected $table = 'messages';

	protected $casts = [
		'from_id' => 'int',
		'to_id' => 'int'
	];

	protected $fillable = [
		'from_id',
		'to_id',
		'message'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'from_id');
	}
}
