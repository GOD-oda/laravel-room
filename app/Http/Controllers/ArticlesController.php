<?php

namespace App\Http\Controllers;

use Agent;
use App\Article;
use Illuminate\Http\Request;
use App\Services\ArticleService;
use App\Services\TagService;
use App\Http\Requests\ContactRequest;

class ArticlesController extends Controller
{
    protected $article;
    protected $tag;

    public function __construct(ArticleService $article, TagService $tag)
    {
        $this->article = $article;
        $this->tag = $tag;
        $this->middleware('exists.article:entry', ['only' => ['show']]);
    }

    public function index(Request $request)
    {
        $articles = $this->article
            ->getPage($request->get('page', 1), 20)
            ->setPath($request->getBasePath());

        $tag_name_list = $this->tag->getTagNameList();

        /**
         * スマホとそれ以外（タブレット以上の横幅）だと
         * デザインが違うのでテンプレートを分ける必要がある
         */
        $ua = $request->server('HTTP_USER_AGENT');
        if (Agent::isMobile($ua)) {
            return view('articles.index-sp', compact('articles'));
        }

        return view('articles.index', compact('articles', 'tag_name_list'));
    }

    public function show($entry)
    {
        $article = $this->article->getArticle($entry);

        return view('articles.show', compact('article'));
    }

    public function tag($tag_name, Request $request)
    {
        $tag_name_list = $this->tag->getTagNameList();
        if (! in_array($tag_name, $tag_name_list, true)) {
            abort(404);
        }

        $articles = $this->article
            ->getArticleByTag($tag_name, $request->get('page', 1))
            ->setPath($request->getBasePath());

        return view('articles.index', compact('articles', 'tag_name_list'));
    }

    public function beginner()
    {
        $articles = collect();
        for ($i = 3; $i < 8; $i++) {
            $articles->put($i, $this->article->getArticleById($i));
        }

        return view('articles.index', compact('articles'));
    }

    public function intermediate()
    {
        $articles = collect();
        for ($i = 8; $i < 13; $i++) {
            $articles->put($i,$this->article->getArticleById($i));
        }

        return view('articles.index', compact('articles'));
    }
}
