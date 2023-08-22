<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Rating
 *
 * @property int $id
 * @property float|null $rating
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $ip
 * @property string|null $nome
 * @property int $imovel_id
 * @property-read \App\Models\Imovel $imovel
 *
 * @method static \Database\Factories\RatingFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Rating newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rating newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rating query()
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereImovelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Rating extends Model
{
    use HasFactory;

    protected $table = 'ratings';

    protected $casts = [
        'rating' => 'float',
        'imovel_id' => 'int',
    ];

    protected $fillable = [
        'rating',
        'ip',
        'nome',
        'imovel_id',
    ];

    public function imovel()
    {
        return $this->belongsTo(Imovel::class);
    }
}
