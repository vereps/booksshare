<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\ExchangeRates\ExchangeRateServiceInterface;

class ExchangeController extends Controller
{

  public function __construct(private ExchangeRateServiceInterface $exchangeRateService)
  {
    
  }

  public function index()
  {
    $exchangeRates = $this->exchangeRateService->getExchangeRates();

    return view('exchange.index', [
      'exchangeRates' => $exchangeRates
    ]);
  }
}
