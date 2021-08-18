<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsUserDefaultMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->is_admin){
            abort(403, 'Não permitido!');
        }
        return $next($request);
    }
}
