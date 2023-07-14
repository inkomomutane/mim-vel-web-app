<?php

namespace App\Models;

use App\Data\IntermediationRuleData;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\WithData;

/**
 * App\Models\IntermediationRule
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property float $percentage
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Imovel> $imovels
 * @property-read int|null $imovels_count
 *
 * @method static \Database\Factories\IntermediationRuleFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|IntermediationRule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IntermediationRule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IntermediationRule query()
 * @method static \Illuminate\Database\Eloquent\Builder|IntermediationRule whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IntermediationRule whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IntermediationRule whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IntermediationRule whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IntermediationRule wherePercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IntermediationRule whereUpdatedAt($value)
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Imovel> $imovels
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Imovel> $imovels
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Imovel> $imovels
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Imovel> $imovels
 *
 * @mixin \Eloquent
 */
class IntermediationRule extends Model
{
    use HasFactory;
    use WithData;

    protected $fillable = [
        'name', 'code', 'percentage',
    ];

    protected $dataClass = IntermediationRuleData::class;

    public function imovels()
    {
        return $this->hasMany(Imovel::class);
    }
}
