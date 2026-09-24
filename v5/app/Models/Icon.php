<?php

namespace App\Models;

use App\Enum\IconSource;
use Illuminate\Database\Eloquent\Model;

class Icon extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'source',
        'icon_node',
        'tags',
        'search_text',
        'is_available',
    ];

    protected function casts(): array
    {
        return [
            'source' => IconSource::class,
            'icon_node' => 'array',
            'tags' => 'array',
            'is_available' => 'boolean',
        ];
    }
}
