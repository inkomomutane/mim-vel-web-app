<?php

namespace App\Models;

use App\Data\PartnerTagData;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\WithData;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class PartnerTag extends Model implements HasMedia
{
    use InteractsWithMedia;
    use WithData;

    protected string $dataClass = PartnerTagData::class;

    protected $fillable = [
        'name',
    ];

    public function registerMediaConversions(
        ?Media $media = null,
    ): void {
        $this->addMediaConversion('thumb')
            ->width(200)
            ->nonQueued();
    }
}
