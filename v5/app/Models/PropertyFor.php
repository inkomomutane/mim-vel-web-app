<?php

namespace App\Models;

use App\Data\TransactionTypeData;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\WithData;

/**
 * App\Models\ImovelFor
 *
 * @property int $id
 * @property string $name
 * @property string|null $slug_text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Property> $imovels
 * @property-read int|null $imovels_count
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyFor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyFor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyFor query()
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyFor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyFor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyFor whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyFor whereSlugText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyFor whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PropertyFor extends Model
{
    use HasFactory;
    use WithData;

    protected $table = 'imovel_fors';

    protected $fillable = [
        'name', 'slug_text',
    ];

    protected $dataClass = TransactionTypeData::class;

    public function imovels()
    {
        return $this->hasMany(Property::class);
    }
}
