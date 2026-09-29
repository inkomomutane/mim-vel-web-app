<?php

namespace App\Models;

use App\Data\TermAndConditionData;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\WithData;

class Term extends Model
{
    use WithData;

    protected string $dataClass = TermAndConditionData::class;

    protected $fillable = [
        'content',
    ];
}
