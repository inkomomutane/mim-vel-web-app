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
 * @package App\Models
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Section> $sections
 * @property-read int|null $sections_count
 * @method static \Illuminate\Database\Eloquent\Builder|Page newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page query()
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereRoute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereUrl($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Section> $sections
 * @mixin \Eloquent
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
