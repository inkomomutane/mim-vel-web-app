<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

/**
 * Class Cidade
 *
 * @property int $id
 * @property string|null $nome
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|Bairro[] $bairros
 *
 * @package App\Models
 */
class Cidade extends Model implements Searchable
{
    use HasFactory;

	protected $table = 'cidades';

	protected $fillable = [
		'nome','province_id'
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
