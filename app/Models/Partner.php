<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $table = 'partners';

	protected $fillable = [
		'name',
        'description'
	];

    public function fotos()
    {
        return $this->morphMany('App\Models\Foto', 'fotable');
    }
}
