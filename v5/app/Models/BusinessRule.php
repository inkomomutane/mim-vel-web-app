<?php

namespace App\Models;

use App\Data\RegraDeNegocioData;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\WithData;


class BusinessRule extends Model
{
    use WithData;

    protected $fillable = [
        'name',
    ];

    protected $dataClass = RegraDeNegocioData::class;

    public function imovels()
    {
        return $this->hasMany(Property::class);
    }
}
