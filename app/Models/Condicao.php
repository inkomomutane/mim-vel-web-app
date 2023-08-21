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
 * @property-read Collection<int, \App\Models\Imovel> $imovels
 * @property-read int|null $imovels_count
 * @method static \Illuminate\Database\Eloquent\Builder|Condicao newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Condicao newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Condicao query()
 * @method static \Illuminate\Database\Eloquent\Builder|Condicao whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Condicao whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Condicao whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Condicao whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Condicao extends Model
{
    use WithData;

    protected $table = 'condicaos';

    protected $dataClass = CondicaoData::class;

    protected $fillable = [
        'nome',
    ];

    public function imovels()
    {
        return $this->hasMany(Imovel::class);
    }
}
