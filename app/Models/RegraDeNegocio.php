<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\RegraDeNegocio
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Imovel> $imovels
 * @property-read int|null $imovels_count
 * @method static \Database\Factories\RegraDeNegocioFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|RegraDeNegocio newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RegraDeNegocio newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RegraDeNegocio query()
 * @method static \Illuminate\Database\Eloquent\Builder|RegraDeNegocio whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegraDeNegocio whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegraDeNegocio whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegraDeNegocio whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Imovel> $imovels
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Imovel> $imovels
 * @mixin \Eloquent
 */
class RegraDeNegocio extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function imovels()
    {
        return $this->hasMany(Imovel::class);
    }
}
