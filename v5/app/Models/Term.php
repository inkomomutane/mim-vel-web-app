<?php


namespace App\Models;

use App\Data\TermAndConditionData;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\WithData;

class Term extends Model
{
    use WithData;

    protected $table = 'termos';

    protected $dataClass = TermAndConditionData::class;

    protected $appends = ['term'];

    protected $fillable = [
        'termos',
    ];

    public function getTermAttribute()
    {
        return $this->termos;
    }
}
