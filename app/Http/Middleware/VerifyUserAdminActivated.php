<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyUserAdminActivated
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
        if(!auth()->user()->activated){
            Auth::logout();
            return redirect()->route('login')->with('user_blocked', 'Sua conta foi bloqueado pelo administrador');
        }
        return $next($request);
    }
}
