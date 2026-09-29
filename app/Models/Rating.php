<?php

namespace App\Models;

use App\Data\RatingData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\LaravelData\WithData;

class Rating extends Model
{
    use WithData;

    protected string $dataClass = RatingData::class;

    protected $casts = [
        'rating' => 'float',
        'property_id' => 'int',
    ];

    protected $fillable = [
        'rating',
        'ip',
        'name',
        'property_id',
    ];

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}
