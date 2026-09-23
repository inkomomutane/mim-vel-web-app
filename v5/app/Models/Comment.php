<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comentarios';

    protected $casts = [
        'imovel_id' => 'int',
    ];

    protected $fillable = [
        'comentario',
        'nome',
        'ip',
        'imovel_id',
    ];

    public function imovel()
    {
        return $this->belongsTo(Property::class);
    }
}
