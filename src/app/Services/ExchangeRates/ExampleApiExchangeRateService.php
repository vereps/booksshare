<?php

namespace App\Services\ExchangeRates;

use App\Models\ExchangeRate;
use Illuminate\Support\Facades\Http;

class ExampleApiExchangeRateService implements ExchangeRateServiceInterface
{

  public function __construct(private string $authKey)
  {
  }

  /**
   * @return ExchangeRate[]
   */
  public function getExchangeRates(): array
  {
    $response = Http::get('https://api.exchangerate.host/latest', ['auth_key' => $this->authKey]);

    $ratesUnprocessed = $response->json()['rates'];
    $result = [];

    foreach ($ratesUnprocessed as $symbol => $rate) {
      $result[] = new ExchangeRate($symbol, $rate);
    }

    return $result;
    return [];
  }
}
