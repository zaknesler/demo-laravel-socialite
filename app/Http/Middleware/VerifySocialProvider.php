<?php

namespace App\Http\Middleware;

use Closure;

class VerifySocialProvider
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
        if (!in_array($request->provider, array_keys(config('auth.social.providers')))) {
            return redirect()->back();
        }

        return $next($request);
    }
}
