<?php

namespace App\Models;

use App\Data\CommentData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\LaravelData\WithData;

class Comment extends Model
{
    use WithData;

    protected string $dataClass = CommentData::class;

    protected $casts = [
        'property_id' => 'int',
    ];

    protected $fillable = [
        'comment',
        'name',
        'ip',
        'property_id',
    ];

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}
