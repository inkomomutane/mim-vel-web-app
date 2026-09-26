<?php

namespace App\Models;

use App\Data\BusinessRuleData;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\WithData;


class BusinessRule extends Model
{
    use WithData;

    protected $table = 'regra_de_negocios';

    protected $fillable = [
        'name',
    ];

    protected $dataClass = BusinessRuleData::class;

    public function imovels()
    {
        return $this->hasMany(Property::class);
    }
}
