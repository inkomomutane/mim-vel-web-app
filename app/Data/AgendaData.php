<?php

namespace App\Data;

use Carbon\Carbon;
use Carbon\CarbonImmutable;
use DateTime;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;


#[MapInputName(SnakeCaseMapper::class)]
/** @typescript */
class AgendaData extends Data
{
    public function __construct(
      public readonly ?int $id = null,
      public readonly ?String $nomeDoCliente = '',
      public readonly ?String $mensagem = '',
      public readonly ?String $email = '',
      public readonly ?String $contacto = '',
      public readonly ?bool $isReaded = null,
      #[WithCast(DateTimeInterfaceCast::class, type: CarbonImmutable::class)]
      public  $dataHora = null,
      public readonly ?String $url = ''
    ) {}
}
