<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckSetup
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->setup_completed === null) {
            return redirect()->route('setup.index');
        } else if (Auth::user()->setup_completed === 0) {
            return redirect()->route('setup.processing');
        }
        return $next($request);
    }
}
