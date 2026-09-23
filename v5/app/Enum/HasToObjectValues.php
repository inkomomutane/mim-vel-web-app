<?php

namespace App\Enum;

use App\Data\KeyValueDto;

trait HasToObjectValues
{
    public static function toValues(): array
    {
        return collect(static::cases())->map(fn (self $enum) => KeyValueDto::from([
            'key' => $enum->value,
            'value' => $enum->stringifyName($enum->name),
        ]))->toArray();
    }


    public  function stringifyName(string $name): string
    {
        return \Str::title(str_replace('_', ' ', $name));
    }
}
