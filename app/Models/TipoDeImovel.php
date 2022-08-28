<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * Class TipoDeImovel
 *
 * @property int $id
 * @property string|null $nome
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|Imovel[] $imovels
 *
 * @package App\Models
 */
class TipoDeImovel extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;

	protected $table = 'tipo_de_imovels';

	protected $fillable = [
		'nome'
	];

	public function imovels()
	{
		return $this->hasMany(Imovel::class);
	}

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')->width('200')->nonQueued();
        $this->addMediaCollection('icons')
        ->singleFile();
    }
}
