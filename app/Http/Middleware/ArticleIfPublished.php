<?php

namespace App\Http\Middleware;

use Closure;
use App\Article;

class ArticleIfPublished
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $id)
    {
        dd($id);

        return $next($request);
    }
}
