<?php

namespace App\Http\Middleware;

use App\Services\ArticleService;
use Closure;

class ExistsArticleById
{
    protected $article;
    protected $redirectToAdmin = '/blog';
    protected $redirectTo = '/';
    protected $parameterName = 'blog';

    public function __construct(ArticleService $article)
    {
        $this->article = $article;
    }

    public function handle($request, Closure $next, $for = 'admin')
    {
        if ($for !== 'admin') {
            $this->parameterName = 'entry';
        }

        if (!$this->article->getArticleById($request->route()->getParameter($this->parameterName))) {
            $uri = $this->redirectToAdmin;
            if ($for !== 'admin') {
                $uri = $this->redirectTo;
            }

            return redirect($uri);
        }

        return $next($request);
    }
}
