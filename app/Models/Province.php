<?php

namespace App\Models;

use App\Data\ProvinceData;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\WithData;

class Province extends Model
{
    use HasFactory;
    use WithData;

    protected $table = "provinces";
    protected $dataClass = ProvinceData::class;
    protected $fillable = [
        'name'
    ];

    public function cidades()
    {
        return $this->hasMany(Cidade::class);
    }
}
