<?php

namespace App\Http\Middleware\Auth;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /*request authenticated user (any)*/
        /*further validation (like admin, user etc... are done in separate middlewares)*/
        if (!auth()->check()) {
            return redirect()->route('auth.401')->with('test', 'Test message');
        }
        return $next($request);
    }
}
