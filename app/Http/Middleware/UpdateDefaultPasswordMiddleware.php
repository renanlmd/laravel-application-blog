<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UpdateDefaultPasswordMiddleware
{
    protected $except = [
        '/admin/nova-senha',
    ];
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    protected function inExceptArray($request)
    {
        foreach ($this->except as $except) {
            if ($except !== '/') {
                $except = trim($except, '/');
            }

            if ($request->is($except)) {
                return true;
            }
        }

        return false;
    }

    public function handle(Request $request, Closure $next)
    {
        if (Hash::check('admin123', auth()->user()->password)) {
            if (!$this->inExceptArray($request)) {
                if (true) {
                    return redirect()->intended('admin/nova-senha');

                }
            }
        }else{
            Session::flash('password_updated', true);
            
        }
        
        return $next($request);
    }
}
