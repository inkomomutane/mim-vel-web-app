<?php

namespace App\Enum;

enum AlertStatus : string
{
    use HasToObjectValues;
    use HasToArrayValues;

    case Success = 'success';
    case Error = 'error';
    case Info = 'info';
    case Warning = 'warning';
}
