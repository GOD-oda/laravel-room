<?php

namespace App\Http\Middleware;

use Closure;
use App\Article;
use Carbon\Carbon;

class ExistsArticle
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
        $article = Article::find($request->route()->getParameter('article'));

        if (! $article) {
            dd('not exists...');
        }

        if ($article->published_at > Carbon::now()) {
            dd('cant publish');
        }

        dd('exists!');


        return $next($request);
    }
}
