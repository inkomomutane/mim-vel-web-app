<?php

namespace App\Models;

use App\Data\IntermediationRuleData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\LaravelData\WithData;

class IntermediationRule extends Model
{
    use WithData;

    protected $fillable = [
        'name', 'code', 'percentage',
    ];

    protected string $dataClass = IntermediationRuleData::class;

    public function properties(): HasMany
    {
        return $this->hasMany(Property::class);
    }
}
