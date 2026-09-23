<?php

namespace App\Data;

use App\Enum\AlertStatus;
use Spatie\LaravelData\Data;

/**
 * @typescript
 */
class AlertDto extends Data
{
    public function __construct(
        public AlertStatus $type,
        public string $message,
    ) {
    }

    public static function success(string $message): self
    {
        return new self(AlertStatus::Success, $message);
    }

    public static function error(string $message): self
    {
        return new self(AlertStatus::Error, $message);
    }

    public static function info(string $message): self
    {
        return new self(AlertStatus::Info, $message);
    }

    public static function warning(string $message): self
    {
        return new self(AlertStatus::Warning, $message);
    }
}
