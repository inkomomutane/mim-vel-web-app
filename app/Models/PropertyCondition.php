<?php

namespace App\Models;

use App\Data\PropertyConditionData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\LaravelData\WithData;

class PropertyCondition extends Model
{
    use WithData;

    protected string $dataClass = PropertyConditionData::class;

    protected $fillable = [
        'name',
    ];

    public function properties(): HasMany
    {
        return $this->hasMany(Property::class);
    }
}
