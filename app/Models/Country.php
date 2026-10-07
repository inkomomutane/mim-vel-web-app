<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Sluggable\Attributes\Sluggable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
#[Sluggable(
    from: 'name',
    to: 'slug',
    selfHealing: true,
)]
class Country extends Model
{
    use HasSlug;

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom([
                'name',
            ])
            ->saveSlugsTo('slug');
    }


    protected $fillable = [
        'name',
        'slug',
    ];

    public function provinces(): HasMany
    {
        return $this->hasMany(Province::class);
    }

}
