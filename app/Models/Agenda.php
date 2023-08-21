<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Data\AgendaData;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\WithData;

/**
 * App\Models\Agenda
 *
 * @property int $id
 * @property string|null $nome_do_cliente
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $local
 * @property string|null $contacto
 * @property string|null $data_hora
 * @property int|null $corretor_id
 * @property string $mensagem
 * @property string|null $email
 * @property int|null $imovel_id
 * @property int $is_readed
 * @property-read \App\Models\User|null $corretor
 * @property-read mixed $url
 * @property-read \App\Models\Imovel|null $imovel
 * @method static \Database\Factories\AgendaFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda query()
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda whereContacto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda whereCorretorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda whereDataHora($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda whereImovelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda whereIsReaded($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda whereLocal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda whereMensagem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda whereNomeDoCliente($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Agenda extends Model
{
    use HasFactory;
    use WithData;

    protected $table = 'agendas';

    protected $dataClass = AgendaData::class;

    protected $appends = ['url'];

    protected $casts = [
        'corretor_id' => 'int',
        'imovel_id' => 'int',
    ];

    protected $dates = [
        'data_hora',
    ];

    protected $fillable = [
        'nome_do_cliente',
        'mensagem',
        'email',
        'contacto',
        'data_hora',
        'corretor_id',
        'imovel_id',
    ];

    public function getUrlAttribute()
    {
        return $this->imovel?->slug ?? '';
    }

    public function corretor()
    {
        return $this->belongsTo(User::class, 'corretor_id');
    }

    public function imovel()
    {
        return $this->belongsTo(Imovel::class, 'imovel_id');
    }
}
