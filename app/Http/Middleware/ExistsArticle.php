<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use App\Services\ArticleService;

class ExistsArticle
{
    protected $article;
    protected $redirectToAdmin = '/blog';
    protected $redirectTo = '/article';
    protected $parameterName = 'blog';

    public function __construct(ArticleService $article)
    {
        $this->article = $article;
    }

    public function handle($request, Closure $next, $for = 'admin')
    {
        if ($for !== 'admin') {
            $this->parameterName = 'article';
        }

        if (! $this->article->getArticle($request->route()->getParameter($this->parameterName))) {
            $uri = $this->redirectToAdmin;
            if ($for !== 'admin') {
                $uri = $this->redirectTo;
            }

            return redirect($uri);
        }

        return $next($request);
    }
}
