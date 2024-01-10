<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Data\AttributeData;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Spatie\LaravelData\WithData;
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
    use WithData;

	protected $table = 'attributes';
    protected $dataClass = AttributeData::class;


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
