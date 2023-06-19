<?php

namespace Tests\Unit;

use App\Services\ExchangeRates\ExampleApiExchangeRateService;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Request;
use Tests\TestCase;

class ExampleApiExchangeRateServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_getExchangeRatesSendsRequest(): void
    {
        // Http::fake([
        //     'api.exchangerate.host/*' => Http::response('ok'),
        // ]);

        // $service = new ExampleApiExchangeRateService('test_key-123');

        // $service->getExchangeRates();

        // Http::assertSent(function (Request $request) {
        //     return $request->url() == 'https://api.exchangerate.host/latest' &&
        //         $request->method() === 'Get';
        // });
        // Http::assertSentCount(1);
    }
}
