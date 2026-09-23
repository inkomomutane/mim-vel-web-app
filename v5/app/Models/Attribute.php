<?php

namespace App\Models;

use App\Data\AttributeData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Spatie\LaravelData\WithData;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class Attribute extends Model implements HasMedia
{
    use InteractsWithMedia;
    use WithData;

    protected $table = 'attributes';

    protected string $dataClass = AttributeData::class;

    protected $fillable = [
        'name',
        'description',
    ];

    public function hotels(): MorphToMany
    {
        return $this->morphedByMany(Hotel::class, 'attributable');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('attributes')->withResponsiveImages()->singleFile();
    }
}
