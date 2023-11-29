<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $userType = Auth::user()->type;

            // Check if the user type is 'admin', or 'it'
            if ($userType === 'admin' || $userType === 'it.dbh' || $userType === 'hr.dbh') {
                return $next($request);
            }
        }
        return redirect(route('Login'));
    }
}
