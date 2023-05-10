<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Data\CondicaoData;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Condicao
 *
 * @property int $id
 * @property string|null $nome
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Collection|Imovel[] $imovels
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
