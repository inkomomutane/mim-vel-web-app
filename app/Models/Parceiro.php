<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * Class Parceiro
 *
 * @property int $id
 * @property string|null $nome
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @package App\Models
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @method static \Illuminate\Database\Eloquent\Builder|Parceiro newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Parceiro newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Parceiro query()
 * @method static \Illuminate\Database\Eloquent\Builder|Parceiro whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parceiro whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parceiro whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parceiro whereUpdatedAt($value)
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, Media> $media
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, Media> $media
 * @mixin \Eloquent
 */
class Parceiro extends Model implements HasMedia
{
    use InteractsWithMedia;

	protected $table = 'parceiros';

	protected $fillable = [
		'nome'
	];

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')->width('200')->nonQueued();
    }
}
