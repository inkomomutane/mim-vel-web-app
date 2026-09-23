<?php
namespace App\Models;

use App\Data\StatusData;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\WithData;

class Status extends Model
{
    use WithData;

    protected $table = 'statuses';

    protected $dataClass = StatusData::class;

    protected $fillable = [
        'nome',
    ];

    public function imovels()
    {
        return $this->hasMany(Property::class);
    }
}
