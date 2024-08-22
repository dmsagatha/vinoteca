<?php

namespace App\Traits;

use NumberFormatter;

trait WithCurrencyFormatter
{
  public function formatCurrency($value): string
  {
    $formatter = new NumberFormatter('es_CO', NumberFormatter::CURRENCY);

    return $formatter->formatCurrency($value, 'COP');
  }
}
