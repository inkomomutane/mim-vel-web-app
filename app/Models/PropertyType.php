<?php

namespace App\Models;

use App\Data\PropertyTypeData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\LaravelData\WithData;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class PropertyType extends Model implements HasMedia
{
    use InteractsWithMedia;
    use WithData;

    protected string $dataClass = PropertyTypeData::class;

    protected $fillable = [
        'name',
    ];

    public function properties(): HasMany
    {
        return $this->hasMany(Property::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('icons')
            ->withResponsiveImages()
            ->singleFile();
    }
}
