<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Data\ImovelTypeData;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\WithData;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * App\Models\TipoDeImovel
 *
 * @property int $id
 * @property string|null $nome
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Collection<int, \App\Models\Imovel> $imovels
 * @property-read int|null $imovels_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @method static \Illuminate\Database\Eloquent\Builder|TipoDeImovel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoDeImovel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoDeImovel query()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoDeImovel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TipoDeImovel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TipoDeImovel whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TipoDeImovel whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TipoDeImovel extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    use WithData;

    protected $table = 'tipo_de_imovels';

    protected $dataClass = ImovelTypeData::class;

    protected $fillable = [
        'nome',
    ];

    public function imovels()
    {
        return $this->hasMany(Imovel::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('icons')->withResponsiveImages()->singleFile();
    }
}
