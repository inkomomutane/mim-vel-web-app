<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Data\CityData;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\WithData;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

/**
 * App\Models\Cidade
 *
 * @property int $id
 * @property string|null $nome
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $province_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Bairro> $bairros
 * @property-read int|null $bairros_count
 * @property-read \App\Models\Province|null $province
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Cidade newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cidade newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cidade query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cidade whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cidade whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cidade whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cidade whereProvinceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cidade whereUpdatedAt($value)
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Bairro> $bairros
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Bairro> $bairros
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Bairro> $bairros
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Bairro> $bairros
 *
 * @mixin \Eloquent
 */
class Cidade extends Model implements Searchable
{
    use HasFactory;
    use WithData;

    protected $table = 'cidades';

    protected $dataClass = CityData::class;

    protected $fillable = [
        'nome', 'province_id',
    ];

    public function bairros()
    {
        return $this->hasMany(Bairro::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function getSearchResult(): SearchResult
    {
        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->nome,
        );
    }
}
