<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles,InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function agendas()
	{
		return $this->hasMany(Agenda::class, 'corretor_id');
	}

	public function imovels()
	{
		return $this->hasMany(Imovel::class, 'corretor_id');
	}

	public function receivedMessages()
	{
		return $this->hasMany(Message::class, 'to_id');
	}

    public function sentMessages()
	{
		return $this->hasMany(Message::class, 'from_id');
	}

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')->width('200')->nonQueued();
    }

    public static function last()
    {
        return Static::all()->last();
    }
}
