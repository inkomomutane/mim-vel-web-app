<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * Class Section
 *
 * @property int $id
 * @property int|null $sectionable_id
 * @property string|null $sectionable_type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $content
 * @property string|null $title
 *
 * @package App\Models
 */
class Section extends Model implements HasMedia
{
    use InteractsWithMedia;
    
	protected $table = 'sections';

	protected $casts = [
		'sectionable_id' => 'int'
	];

	protected $fillable = [
		'sectionable_id',
		'sectionable_type',
		'content',
		'title'
	];

    public function sections()
    {
        return $this->morphMany(Section::class, 'sectionable');
    }
}
