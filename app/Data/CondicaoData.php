<?php

namespace App\Data;

use Spatie\LaravelData\Data;

/** @typescript */
class CondicaoData extends Data
{
    public function __construct(
      public readonly ?int $id,
      public readonly ?string $nome,
    ) {}
}
