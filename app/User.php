<?php

namespace App;

use App\Models\Agenda;
use App\Models\Imovel;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

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
}
