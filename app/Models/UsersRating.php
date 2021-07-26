<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UsersRating
 * 
 * @property int $users_id
 * @property int $imovels_id
 * @property float|null $rating
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $id
 * 
 * @property Imovel $imovel
 * @property User $user
 *
 * @package App\Models
 */
class UsersRating extends Model
{
	protected $table = 'users_ratings';

	protected $casts = [
		'users_id' => 'int',
		'imovels_id' => 'int',
		'rating' => 'float'
	];

	protected $fillable = [
		'rating'
	];

	public function imovel()
	{
		return $this->belongsTo(Imovel::class, 'imovels_id');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'users_id');
	}
}
