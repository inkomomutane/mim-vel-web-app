<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImovelFor extends Model
{
    use HasFactory;

    protected $table = 'imovel_fors';

    protected $fillable = [
        'name','slug_text'
    ];

    public function imovels()
    {
        return $this->hasMany(Imovel::class);
    }
}
