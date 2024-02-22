<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetSanctumGuardMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (Str::startsWith($request->getRequestUri(), '/api/adm')) {
            config(['sanctum.guard' => 'ADM']);
        }else{
            return 'Sem guard';
        }
        return $next($request);
    }
}