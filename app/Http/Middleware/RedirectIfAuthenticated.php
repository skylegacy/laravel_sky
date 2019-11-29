<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        switch ($guard){

            case 'admin':

            if ( !Auth::guard($guard)->user() )
            {
                // here you should redirect to login
            }

            echo 'ddddd<br>';

            break;

            default:

                if (Auth::guard($guard)->check()) {

                }

            break;

        }



        return $next($request);
    }
}
