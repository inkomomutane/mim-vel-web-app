<?php


namespace App\Models;

use App\Data\ImovelTypeData;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\WithData;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class PropertyType extends Model implements HasMedia
{
    use InteractsWithMedia;
    use WithData;

    protected $table = 'tipo_de_imovels';

    protected $dataClass = ImovelTypeData::class;

    protected $fillable = [
        'nome',
    ];

    public function imovels()
    {
        return $this->hasMany(Property::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('icons')->withResponsiveImages()->singleFile();
    }
}
