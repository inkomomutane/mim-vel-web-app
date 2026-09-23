<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $table = 'ratings';

    protected $casts = [
        'rating' => 'float',
        'imovel_id' => 'int',
    ];

    protected $fillable = [
        'rating',
        'ip',
        'nome',
        'imovel_id',
    ];

    public function imovel()
    {
        return $this->belongsTo(Property::class);
    }
}
