<?php

namespace App\Models;

use App\Data\IntermediationRuleData;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\WithData;

class IntermediationRule extends Model
{
    use WithData;

    protected $fillable = [
        'name', 'code', 'percentage',
    ];

    protected $dataClass = IntermediationRuleData::class;

    public function imovels()
    {
        return $this->hasMany(Property::class);
    }
}
