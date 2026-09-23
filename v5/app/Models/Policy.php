<?php

namespace App\Models;

use App\Data\PolicyData;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\WithData;

class Policy extends Model
{
    use WithData;

    protected $table = 'politicas';

    protected $dataClass = PolicyData::class;

    protected $fillable = [
        'politicas',
    ];
}
