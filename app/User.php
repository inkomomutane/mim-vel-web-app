<?php

namespace App;

use App\Models\Agenda;
use App\Models\Imovel;
use App\Models\Role;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

	protected $casts = [
		'role_id' => 'int'
	];

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
		'role_id',
		'image_url'
	];

    public function role()
	{
		return $this->belongsTo(Role::class);
	}

	public function agendas()
	{
		return $this->hasMany(Agenda::class, 'corretor_id');
	}

	public function imovels()
	{
		return $this->hasMany(Imovel::class, 'postado_por');
	}
}
