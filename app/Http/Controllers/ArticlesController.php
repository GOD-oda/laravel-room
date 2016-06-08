<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ArticleService;
use App\Article;

class ArticlesController extends Controller
{
    protected $article;

    public function __construct(ArticleService $article)
    {
        $this->article = $article;
        $this->middleware('exists.article:entry', ['only' => ['show']]);
    }

    public function index(Request $request)
    {
        $articles = $this->article
            ->getPage($request->get('page', 1), 20)
            ->setPath($request->getBasePath());

        return view('articles.index', compact('articles'));
    }

    public function show($id)
    {
        $article = $this->article->getArticle($id);

        return view('articles.show', compact('article'));
    }
}