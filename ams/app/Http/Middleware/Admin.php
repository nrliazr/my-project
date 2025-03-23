<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // If user try to log in, if user type is not equal to admin,
        if(Auth::user()->userType != 'admin'){
            return redirect('home'); //then redirect user to user dashboard
        }
        // Else if user type is admin, then redirect to admin dashboard
        return $next($request);
    }
}
