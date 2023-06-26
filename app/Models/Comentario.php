<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Comentario
 *
 * @property int $id
 * @property string|null $comentario
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $nome
 * @property string|null $ip
 * @property int $imovel_id
 * @property-read \App\Models\Imovel $imovel
 * @method static \Illuminate\Database\Eloquent\Builder|Comentario newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comentario newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comentario query()
 * @method static \Illuminate\Database\Eloquent\Builder|Comentario whereComentario($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comentario whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comentario whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comentario whereImovelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comentario whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comentario whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comentario whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Comentario extends Model
{
    protected $table = 'comentarios';

    protected $casts = [
        'imovel_id' => 'int',
    ];

    protected $fillable = [
        'comentario',
        'nome',
        'ip',
        'imovel_id',
    ];

    public function imovel()
    {
        return $this->belongsTo(Imovel::class);
    }
}
