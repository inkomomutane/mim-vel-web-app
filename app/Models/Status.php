<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Data\StatusData;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\WithData;

/**
 * App\Models\Status
 *
 * @property int $id
 * @property string|null $nome
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Collection<int, \App\Models\Imovel> $imovels
 * @property-read int|null $imovels_count
 * @method static \Illuminate\Database\Eloquent\Builder|Status newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Status newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Status query()
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Status extends Model
{
    use HasFactory;
    use WithData;

    protected $table = 'statuses';

    protected $dataClass = StatusData::class;

    protected $fillable = [
        'nome',
    ];

    public function imovels()
    {
        return $this->hasMany(Imovel::class);
    }
}
