<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Video
 *
 * @property int $id
 * @property string|null $url
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $videoble_id
 * @property string|null $videoble_type
 *
 * @package App\Models
 */
class Video extends Model
{
	protected $table = 'videos';

	protected $casts = [
		'videoble_id' => 'int'
	];

	protected $fillable = [
		'url',
		'videoble_id',
		'videoble_type'
	];
    public function videoble()
    {
        return $this->morphTo();
    }
}
