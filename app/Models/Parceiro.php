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
 *
 * @package App\Models
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
