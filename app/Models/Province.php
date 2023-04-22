<?php

namespace App\Models;

use App\Data\ProvinceData;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\WithData;

/**
 * App\Models\Province
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Cidade> $cidades
 * @property-read int|null $cidades_count
 * @method static \Database\Factories\ProvinceFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Province newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Province newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Province query()
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Cidade> $cidades
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Cidade> $cidades
 * @mixin \Eloquent
 */
class Province extends Model
{
    use HasFactory;
    use WithData;

    protected $table = "provinces";
    protected $dataClass = ProvinceData::class;
    protected $fillable = [
        'name'
    ];

    public function cidades()
    {
        return $this->hasMany(Cidade::class);
    }
}
