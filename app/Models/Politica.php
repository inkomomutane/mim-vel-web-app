<?php

namespace App\Models;

use App\Data\PolicyData;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\WithData;

/**
 * App\Models\Politica
 *
 * @property int $id
 * @property string|null $politicas
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static \Database\Factories\PoliticaFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Politica newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Politica newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Politica query()
 * @method static \Illuminate\Database\Eloquent\Builder|Politica whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Politica whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Politica wherePoliticas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Politica whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Politica extends Model
{
    use HasFactory;
    use WithData;

    protected $table = 'politicas';

    protected $dataClass = PolicyData::class;

    protected $fillable = [
        'politicas',
    ];
}
