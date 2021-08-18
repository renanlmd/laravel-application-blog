<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as ContractsLoginResponse;

class LoginResponse implements ContractsLoginResponse
{
    public function toResponse($request)
    {
        if (auth()->user()->is_admin) {
            
            return redirect()->intended('/admin/home');
            die;
        }
        return redirect()->route('user.home', auth()->user()->username);
    }
}
