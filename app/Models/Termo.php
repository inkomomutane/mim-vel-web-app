<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Data\TermAndConditionData;
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
 * @method static \Illuminate\Database\Eloquent\Builder|Termo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Termo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Termo query()
 * @method static \Illuminate\Database\Eloquent\Builder|Termo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Termo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Termo whereTermos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Termo whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Termo extends Model
{
    use WithData;

    protected $table = 'termos';

    protected $dataClass = TermAndConditionData::class;

    protected $appends = ['term'];

    protected $fillable = [
        'termos',
    ];

    public function getTermAttribute()
    {
            return $this->termos;
    }
}
