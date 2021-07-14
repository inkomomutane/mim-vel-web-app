<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 *
 * @property int $id
 * @property string|null $nome
 * @property string|null $slug
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Role extends Model
{
	protected $table = 'roles';

	protected $fillable = [
		'nome',
		'slug'
	];

	public function users()
	{
		return $this->hasMany(Usersss::class);
	}
}
