<?php

namespace App\Models;

use App\Data\TransactionTypeData;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\WithData;


class PropertyFor extends Model
{
    use WithData;

    protected $table = 'imovel_fors';

    protected $fillable = [
        'name', 'slug_text',
    ];

    protected $dataClass = TransactionTypeData::class;

    public function imovels()
    {
        return $this->hasMany(Property::class);
    }
}
