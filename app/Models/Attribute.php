<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * Class Attribute
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Attributable $attributable
 *
 * @package App\Models
 */
class Attribute extends Model  implements HasMedia
{
    use InteractsWithMedia;

	protected $table = 'attributes';

	protected $fillable = [
		'name',
		'description'
	];

	public function hotels(): MorphToMany
    {
		return $this->morphedByMany(Hotel::class,'attributable');
	}

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('attributes')->singleFile();
    }

}
