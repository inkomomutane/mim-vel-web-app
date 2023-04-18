<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Data\TermoData;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\WithData;

/**
 * Class Termo
 *
 * @property int $id
 * @property string|null $termos
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Termo extends Model
{
    use WithData;

	protected $table = 'termos';
    protected $dataClass = TermoData::class;

	protected $fillable = [
		'termos'
	];
}
