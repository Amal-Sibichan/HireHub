<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Emplogin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('Organization')->check()) {
            return $next($request);
        }

        return redirect()->route('loginpage')->with('message', 'Please login first');
    }
}