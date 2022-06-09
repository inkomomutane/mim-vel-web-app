<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Page
 *
 * @property int $id
 * @property string|null $route
 * @property string|null $url
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Page extends Model
{
	protected $table = 'pages';

	protected $fillable = [
		'route',
		'url'
	];

    public function sections()
    {
        return $this->morphMany(Section::class, 'sectionable');
    }
}
