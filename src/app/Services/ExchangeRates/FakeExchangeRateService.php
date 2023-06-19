<?php

namespace App\Services\ExchangeRates;

use App\Models\ExchangeRate;

class FakeExchangeRateService implements ExchangeRateServiceInterface
{
  public function getExchangeRates(): array
  {
    return [
      new ExchangeRate('AUD', 23.33),
      new ExchangeRate('USD', 1.11),
    ];
  }
}
