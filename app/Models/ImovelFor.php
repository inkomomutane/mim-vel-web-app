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
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Imovel> $imovels
 * @property-read int|null $imovels_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ImovelFor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ImovelFor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ImovelFor query()
 * @method static \Illuminate\Database\Eloquent\Builder|ImovelFor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImovelFor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImovelFor whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImovelFor whereSlugText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImovelFor whereUpdatedAt($value)
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Imovel> $imovels
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Imovel> $imovels
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Imovel> $imovels
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Imovel> $imovels
 *
 * @mixin \Eloquent
 */
class ImovelFor extends Model
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
        return $this->hasMany(Imovel::class);
    }
}
