<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';

    protected $casts = [
        'readed' => 'bool',
        'from_id' => 'int',
        'to_id' => 'int',
    ];

    protected $fillable = [
        'message',
        'readed',
        'from_id',
        'to_id',
    ];

    public function receiver()
    {
        return $this->belongsTo(User::class, 'to_id');
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'from_id');
    }
}
