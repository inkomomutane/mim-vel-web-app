<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Data\NeighborhoodData;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\WithData;

class Neighborhood extends Model
{

    use WithData;

    protected $table = 'bairros';

    protected $dataClass = NeighborhoodData::class;

    protected $casts = [
        'cidade_id' => 'int',
    ];

    protected $fillable = [
        'nome',
        'cidade_id',
    ];

    public function city()
    {
        return $this->belongsTo(City::class,'cidade_id');
    }

    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
