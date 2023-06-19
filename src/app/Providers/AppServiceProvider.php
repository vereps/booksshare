<?php

namespace App\Providers;

use App\Models\book;
use App\Models\User;
use App\Services\ExchangeRates\ExampleApiExchangeRateService;
use App\Services\ExchangeRates\ExchangeRateServiceInterface;
use App\Services\ExchangeRates\FakeExchangeRateService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(ExampleApiExchangeRateService::class, function () {
            $authKey = env('EXCHANGE_RATE_AUTH_KEY');
            return new ExampleApiExchangeRateService($authKey);
        });

        $this->app->singleton(ExchangeRateServiceInterface::class, function () {
            $source = env('EXCHANGE_RATE_SOURCE');

            switch ($source) {
                case 'fake':
                    return $this->app->get(FakeExchangeRateService::class);
                case 'real':
                    return $this->app->get(ExampleApiExchangeRateService::class);
            }
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->get(Factory::class)->share('newUsersThisWeekCount', 10);

        Gate::define('admin', function (User $user): bool {
            return $user->role === 'admin';
        });

        Gate::define('book', function (User $user, Book $book): bool {
            return $user->id === $book->user_id;
        });
    }
}