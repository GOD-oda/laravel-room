<?php

namespace App\Http\Middleware;

use Closure;
use Redirect;
use Config;

class RedirectHttps
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
        if (! $request->isSecure() && Config::get('app.env') === 'production') {
            return $next(Redirect::secure($request->path()));
        }

        return $next($request);
    }
}
