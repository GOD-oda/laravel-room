<?php

namespace App\Http\Middleware;

use Closure;
use Agent;

class SwitchViewForUA
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
        $ua = $request->server('HTTP_USER_AGENT');
        if (Agent::isPhone($ua)) {
            dd(11);
        }
        dd(22);

        return $next($request);
    }
}
