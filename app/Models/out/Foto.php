<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Foto
 *
 * @property int $id
 * @property string|null $url
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $fotable_id
 * @property string|null $fotable_type
 *
 * @package App\Models
 */
class Foto extends Model
{
	protected $table = 'fotos';

	protected $casts = [
		'fotable_id' => 'int'
	];

	protected $fillable = [
		'url',
		'fotable_id',
		'fotable_type'
	];
    public function fotable()
    {
        return $this->morphTo();
    }
}
