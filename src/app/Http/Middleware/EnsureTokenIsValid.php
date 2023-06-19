<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Log\LogManager;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class EnsureTokenIsValid
{
    public function __construct(private LogManager $logger)
    {
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if ($request->input('token') !== 'my-secret-token') {
        //     return redirect('/');
        // }
        
        $response = $next($request);

        // $this->logger->info('Got a request', ['url' => $request->url()]);

        $data = json_decode($response->getContent(), true);
        $data['appended'] = 'hello';

        $response->setContent(json_encode($data));

        return $response;
    }
}
