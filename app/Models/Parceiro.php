<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * App\Models\Parceiro
 *
 * @property int $id
 * @property string|null $nome
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Parceiro newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Parceiro newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Parceiro query()
 * @method static \Illuminate\Database\Eloquent\Builder|Parceiro whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parceiro whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parceiro whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parceiro whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Parceiro extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'parceiros';

    protected $fillable = [
        'nome',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->width('200')->nonQueued();
    }
}
