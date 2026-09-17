<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Data\BairroData;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\WithData;

class Neighborhood extends Model
{

    use WithData;

    protected $table = 'bairros';

    protected $dataClass = BairroData::class;

    protected $casts = [
        'cidade_id' => 'int',
    ];

    protected $fillable = [
        'nome',
        'cidade_id',
    ];

    public function cidade()
    {
        return $this->belongsTo(City::class);
    }

    public function imovels()
    {
        return $this->hasMany(Property::class);
    }
}
