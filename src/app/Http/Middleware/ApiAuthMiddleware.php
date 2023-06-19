<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\UnauthorizedException;

class ApiAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->header('Authorization');
        if (!$token)
            throw new UnauthorizedException();

        $userId = $token;
        $user = User::find($userId);
        if (!$user)
            throw new UnauthorizedException();

        $request->setUserResolver(function () use ($user) {
            return $user;
        });

        return $next($request);
    }
}
