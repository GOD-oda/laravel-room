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
        $this->middleware('exists.article:id', ['only' => ['show']]);
    }

    /**
     * Requestインスタンスはページャーで使う
     * 今は必要ない。
     */
    public function index(Request $request)
    {
        $articles = Article::latest()->published()->get();

        return view('articles.index', compact('articles'));
    }

    public function show($id)
    {
        $article = $this->article->getArticle($id);
        dd($article);
        return view('articles.show', compact('article'));
    }
}