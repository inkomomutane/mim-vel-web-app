<?php

namespace App\Models;

use App\Data\HotelMetaDataDtoData;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\LaravelData\WithData;

/**
 * App\Models\HotelMetaData
 *
 * @property-read \App\Models\Bairro|null $bairro
 * @property-read \App\Models\Condicao|null $condicao
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Hotel> $hotels
 * @property-read int|null $hotels_count
 * @property-read \App\Models\Status|null $status
 * @property-read \App\Models\TipoDeImovel|null $tipoDeImovel
 * @method static \Illuminate\Database\Eloquent\Builder|HotelMetaData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HotelMetaData newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HotelMetaData query()
 * @mixin \Eloquent
 */
class HotelMetaData extends Model
{
    use HasFactory;
    use WithData;

    protected $fillable = [
        'title',
        'address',
        'description',
        'tipo_de_imovel_id',
        'condicao_id',
        'status_id',
        'bairro_id'
    ];

    protected $dataClass = HotelMetaDataDtoData::class;
    protected $table = 'hotel_meta_datas';


    public function tipoDeImovel(): BelongsTo
    {
        return $this->belongsTo(TipoDeImovel::class);
    }


    public function condicao(): BelongsTo
    {
        return $this->belongsTo(Condicao::class);
    }


    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }


    public function bairro(): BelongsTo
    {
        return $this->belongsTo(
            Bairro::class
        );
    }


    public function hotels(): HasMany
    {
        return $this->hasMany(Hotel::class);
    }
}
