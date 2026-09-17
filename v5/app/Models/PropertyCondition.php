<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Data\CondicaoData;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\WithData;

/**
 * App\Models\Condicao
 *
 * @property int $id
 * @property string|null $nome
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Collection<int, \App\Models\Property> $imovels
 * @property-read int|null $imovels_count
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyCondition newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyCondition newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyCondition query()
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyCondition whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyCondition whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyCondition whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyCondition whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PropertyCondition extends Model
{
    use WithData;

    protected $table = 'condicaos';

    protected $dataClass = CondicaoData::class;

    protected $fillable = [
        'nome',
    ];

    public function imovels()
    {
        return $this->hasMany(Property::class);
    }
}
