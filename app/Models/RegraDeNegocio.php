<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegraDeNegocio extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function imovels()
    {
        return $this->hasMany(Imovel::class);
    }
}
