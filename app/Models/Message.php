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
 * @property int $id
 * @property string|null $message
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property bool|null $readed
 * @property int $from_id
 * @property int $to_id
 * @property User $user
 * @package App\Models
 * @property-read \App\Models\User $receiver
 * @property-read \App\Models\User $sender
 * @method static \Illuminate\Database\Eloquent\Builder|Message newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Message newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Message query()
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereFromId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereReaded($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereToId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Message extends Model
{
	protected $table = 'messages';

	protected $casts = [
		'readed' => 'bool',
		'from_id' => 'int',
		'to_id' => 'int'
	];

	protected $fillable = [
		'message',
		'readed',
		'from_id',
		'to_id'
	];

	public function receiver()
	{
		return $this->belongsTo(User::class, 'to_id');
	}

    public function sender()
	{
		return $this->belongsTo(User::class, 'from_id');
	}
}
