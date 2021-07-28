<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $image_url
 * @property string|null $profile_url
 *
 * @property Collection|Agenda[] $agendas
 * @property Collection|Imovel[] $imovels
 * @property Collection|UsersRating[] $users_ratings
 *
 * @package App\Models
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable,HasRoles;
	protected $table = 'users';

	protected $dates = [
		'email_verified_at'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
		'email_verified_at',
		'password',
		'remember_token',
		'image_url',
		'profile_url'
	];

	public function agendas()
	{
		return $this->hasMany(Agenda::class, 'corretor_id');
	}

	public function imovels()
	{
		return $this->hasMany(Imovel::class, 'postado_por');
	}

	public function users_ratings()
	{
		return $this->hasMany(UsersRating::class, 'users_id');
	}
}