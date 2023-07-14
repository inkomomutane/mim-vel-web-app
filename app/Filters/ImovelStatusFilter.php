<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Pricecurrent\LaravelEloquentFilters\AbstractEloquentFilter;

class ImovelStatusFilter extends AbstractEloquentFilter
{
      /** @var array<int> statuses */
      protected array $statuses;

      public function __construct(array $statuses = [])
      {
          $this->statuses = $statuses;
      }

      public function apply(Builder $query): Builder
      {
          return $query->whereIn('status_id', $this->statuses);
      }
}
