<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\Services\ArticleService;
use App\Http\Requests\ContactRequest;

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

    public function show($entry)
    {
        $article = $this->article->getArticle($entry);

        return view('articles.show', compact('article'));
    }
}