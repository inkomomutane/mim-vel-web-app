<?php

namespace App\Models;

use App\Data\NeighborhoodData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\LaravelData\WithData;
use Spatie\Sluggable\Attributes\Sluggable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
#[Sluggable(
    from: 'name',
    to: 'slug',
    selfHealing: true,
)]
class Neighborhood extends Model
{
    use WithData;

    use HasSlug;

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom([
                'name',
            ])
            ->saveSlugsTo('slug');
    }

    protected string $dataClass = NeighborhoodData::class;

    protected $casts = [
        'city_id' => 'int',
    ];

    protected $fillable = [
        'name',
        'city_id',
        'slug',
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
