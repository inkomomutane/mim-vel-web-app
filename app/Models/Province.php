<?php

namespace App\Models;

use App\Data\ProvinceData;
use Illuminate\Database\Eloquent\Model;
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
class Province extends Model
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

    protected string $dataClass = ProvinceData::class;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }
}
