<?php

namespace App\Models;

use App\Data\RegraDeNegocioData;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\WithData;

/**
 * App\Models\RegraDeNegocio
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Property> $imovels
 * @property-read int|null $imovels_count
 * @method static \Database\Factories\RegraDeNegocioFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessRule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessRule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessRule query()
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessRule whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessRule whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessRule whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessRule whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BusinessRule extends Model
{
    use WithData;

    protected $fillable = [
        'name',
    ];

    protected $dataClass = RegraDeNegocioData::class;

    public function imovels()
    {
        return $this->hasMany(Property::class);
    }
}
