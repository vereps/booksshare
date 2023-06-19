<?php

namespace App\Services\ExchangeRates;

interface ExchangeRateServiceInterface
{
  /**
   * @return ExchangeRate[]
   */
  public function getExchangeRates(): array;
}
