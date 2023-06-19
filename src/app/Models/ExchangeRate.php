<?php

namespace App\Models;

class ExchangeRate
{
  public function __construct(public string $symbol, public float $rate)
  {
  }
}
