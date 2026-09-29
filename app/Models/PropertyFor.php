<?php

namespace App\Models;

use App\Data\PropertyForData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\LaravelData\WithData;

class PropertyFor extends Model
{
    use WithData;

    protected string $dataClass = PropertyForData::class;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function properties(): HasMany
    {
        return $this->hasMany(Property::class);
    }
}
