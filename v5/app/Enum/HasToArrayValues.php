<?php

namespace App\Enum;

trait HasToArrayValues
{
    public static function toArray(): array
    {
        return collect(static::cases())->map(fn (self $enum) => $enum->value)->toArray();
    }
}
