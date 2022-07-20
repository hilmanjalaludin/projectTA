<?php

namespace App\Http\Middleware;
use Validator, Redirect, Response;
use Closure;

class CheckUserSession
{

    public function handle($request, Closure $next)
    {
        if (!$request->session()->exists('name')) {
            // user value cannot be found in session
            return Redirect::to("login")->withSuccess('Login Gagal');
        }

        return $next($request);
    }

}

