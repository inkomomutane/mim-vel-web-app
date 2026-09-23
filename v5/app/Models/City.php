<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Data\CityData;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\WithData;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class City extends Model implements Searchable
{

    use WithData;

    protected $table = 'cidades';

    protected $dataClass = CityData::class;

    protected $fillable = [
        'nome', 'province_id',
    ];

    public function bairros()
    {
        return $this->hasMany(Neighborhood::class);
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
