<?php

namespace App\Providers;

use App\Models\ExchangeRate;
use Illuminate\Support\ServiceProvider;

class ExchangeRateServiceProvider extends ServiceProvider
{

    /**
     * @return ExchangeRate
     */
    public function getExchangeRates(): array
    {
        return [
            new ExchangeRate('AUD', 1.001),
            new ExchangeRate('EUR', 2.21),
        ];
    }
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
