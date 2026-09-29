<?php

namespace App\Models;

use App\Data\BusinessRuleData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\LaravelData\WithData;

class BusinessRule extends Model
{
    use WithData;

    protected string $dataClass = BusinessRuleData::class;

    protected $fillable = [
        'name',
    ];

    public function properties(): HasMany
    {
        return $this->hasMany(Property::class);
    }
}
