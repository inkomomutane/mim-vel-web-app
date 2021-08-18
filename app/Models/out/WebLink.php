<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class WebLink
 *
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $id
 * @property string|null $url
 * @property string|null $icon
 *
 * @package App\Models
 */
class WebLink extends Model
{
	protected $table = 'web_links';

	protected $fillable = [
		'url',
		'icon'
	];
    public function fotos()
    {
        return $this->morphMany('App\Models\Foto', 'fotable');
    }

    public function vzt()
    {
        return visits($this);
    }
    public function visits()
    {
        return visits($this)->relation();
    }
}
