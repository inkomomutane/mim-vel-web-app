<?php

namespace App\Data;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapInputName(SnakeCaseMapper::class)]
/** @typescript */
class AgendaData extends Data
{
    public function __construct(
      public readonly ?int $id = null,
      public readonly ?string $nomeDoCliente = '',
      public readonly ?string $mensagem = '',
      public readonly ?string $email = '',
      public readonly ?string $contacto = '',
      public readonly ?bool $isReaded = null,
      #[WithCast(DateTimeInterfaceCast::class, type: CarbonImmutable::class)]
      public $dataHora = null,
      public readonly ?string $url = ''
    ) {
    }
}
