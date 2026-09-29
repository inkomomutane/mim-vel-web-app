<?php

namespace App\Models;

use App\Data\StatusData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\LaravelData\WithData;

class Status extends Model
{
    use WithData;

    protected string $dataClass = StatusData::class;

    protected $fillable = [
        'name',
    ];

    public function properties(): HasMany
    {
        return $this->hasMany(Property::class);
    }
}
