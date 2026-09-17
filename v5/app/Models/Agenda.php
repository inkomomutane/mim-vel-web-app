<?php


namespace App\Models;

use App\Data\AgendaData;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\WithData;


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
        return $this->belongsTo(Property::class, 'imovel_id');
    }
}
