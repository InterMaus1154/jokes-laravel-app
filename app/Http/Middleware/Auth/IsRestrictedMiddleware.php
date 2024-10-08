<?php

namespace App\Http\Middleware\Auth;

use App\Helpers\Enums\UserRole;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsRestrictedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /*checks if user role is restricted*/
        /*if restricted, account is restricted, redirects to different route*/
        if(!auth()->check() || auth()->user()->role === UserRole::RESTRICTED->value){
            return redirect()->route('auth.403');
        }
        return $next($request);
    }
}
