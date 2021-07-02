<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle($request, Closure $next)
    // {
    //     return $next($request);
    // }
    public function handle($request, Closure $next)
    {
        $messages = config('message');
        if (Auth::user()->role == 1 || Auth::user()->role==2) {
            return $next($request);
          }
        return redirect('/')->withErrors("Please login first");
    }
}
