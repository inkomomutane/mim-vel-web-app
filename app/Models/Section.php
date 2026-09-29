<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Section extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'sections';

    protected $casts = [
        'sectionable_id' => 'int',
    ];

    protected $fillable = [
        'sectionable_id',
        'sectionable_type',
        'content',
        'title',
    ];

    public function sections(): MorphMany
    {
        return $this->morphMany(__CLASS__, 'sectionable');
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')->width('200')->nonQueued();
    }
}
