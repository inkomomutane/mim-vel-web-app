<?php


namespace App\Models;

use App\Data\CondicaoData;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\WithData;

class PropertyCondition extends Model
{
    use WithData;

    protected $table = 'condicaos';

    protected $dataClass = CondicaoData::class;

    protected $fillable = [
        'nome',
    ];

    public function imovels()
    {
        return $this->hasMany(Property::class);
    }
}
