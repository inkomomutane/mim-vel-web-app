<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Data\BairroData;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\WithData;

/**
 * App\Models\Bairro
 *
 * @property int $id
 * @property string|null $nome
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $cidade_id
 * @property-read \App\Models\Cidade $cidade
 * @property-read Collection<int, \App\Models\Imovel> $imovels
 * @property-read int|null $imovels_count
 * @method static \Illuminate\Database\Eloquent\Builder|Bairro newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bairro newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bairro query()
 * @method static \Illuminate\Database\Eloquent\Builder|Bairro whereCidadeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bairro whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bairro whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bairro whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bairro whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Bairro extends Model
{
    use HasFactory;
    use WithData;

    protected $table = 'bairros';

    protected $dataClass = BairroData::class;

    protected $casts = [
        'cidade_id' => 'int',
    ];

    protected $fillable = [
        'nome',
        'cidade_id',
    ];

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }

    public function imovels()
    {
        return $this->hasMany(Imovel::class);
    }
}
