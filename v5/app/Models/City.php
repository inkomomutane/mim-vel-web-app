<?php


namespace App\Models;

use App\Data\CityData;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\WithData;

class City extends Model
{

    use WithData;

    protected $table = 'cidades';

    protected $dataClass = CityData::class;

    protected $fillable = [
        'nome', 'province_id',
    ];

    public function neighborhood()
    {
        return $this->hasMany(Neighborhood::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class,'province_id');
    }
}
