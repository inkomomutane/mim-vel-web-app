<?php


namespace App\Models;

use App\Data\MessageData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\LaravelData\WithData;


class Message extends Model
{

    use WithData;

    protected string $dataClass = MessageData::class;

    protected $appends = ['url'];

    protected $casts = [
        'date_time' => 'datetime',
    ];


    protected $fillable = [
          'client_name',
          'message',
          'email',
          'contact',
          'date_time',
          'broker_id',
          'property_id',
    ];

    public function getUrlAttribute()
    {
        return $this->property?->slug ?? '';
    }

    public function broker(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}
