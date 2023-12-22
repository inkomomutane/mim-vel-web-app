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
 * @property int $id
 * @property string|null $title
 * @property string|null $address
 * @property string|null $description
 * @property int $tipo_de_imovel_id
 * @property int $condicao_id
 * @property int $status_id
 * @property int $bairro_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Bairro $bairro
 * @property-read \App\Models\Condicao $condicao
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Hotel> $hotels
 * @property-read int|null $hotels_count
 * @property-read \App\Models\Status $status
 * @property-read \App\Models\TipoDeImovel $tipoDeImovel
 * @method static \Illuminate\Database\Eloquent\Builder|HotelMetaData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HotelMetaData newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HotelMetaData query()
 * @method static \Illuminate\Database\Eloquent\Builder|HotelMetaData whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HotelMetaData whereBairroId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HotelMetaData whereCondicaoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HotelMetaData whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HotelMetaData whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HotelMetaData whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HotelMetaData whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HotelMetaData whereTipoDeImovelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HotelMetaData whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HotelMetaData whereUpdatedAt($value)
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
