<?php

namespace App\Models;

use App\Data\NeighborhoodData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\LaravelData\WithData;

class Neighborhood extends Model
{
    use WithData;

    protected string $dataClass = NeighborhoodData::class;

    protected $casts = [
        'city_id' => 'int',
    ];

    protected $fillable = [
        'name',
        'city_id',
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function properties(): HasMany
    {
        return $this->hasMany(Property::class);
    }
}
