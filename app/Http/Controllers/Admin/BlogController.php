<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleStoreRequest;
use App\Http\Requests\ArticleUpdateRequest;
use App\Services\ArticleService;
use App\Services\TagService;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Response;

class BlogController extends Controller
{
    protected $article;
    protected $tag;
    protected $guard;

    public function __construct(ArticleService $article, TagService $tag, Guard $guard)
    {
        $this->article = $article;
        $this->guard = $guard;
        $this->tag = $tag;
        $this->middleware('exists.articleById', ['only' => ['show', 'edit', 'update']]);
    }

    public function index(Request $request)
    {
        $articles = $this->article
            ->getPage($request->get('page', 1), 20, true)
            ->setPath($request->getBasePath());

        return view('admin.blog.index', compact('articles'));
    }

    public function show($entry)
    {
        $article = $this->article->getArticle($entry);

        return view('admin.blog.show', compact('article'));
    }

    public function create()
    {
        $all_tags = $this->tag->getAll();

        return view('admin.blog.create', compact('all_tags'));
    }

    public function store(ArticleStoreRequest $request)
    {
        $user_id = $this->guard->user()->id;
        $success_flag = $this->article->saveArticle($request, $user_id);

        if (!$success_flag) {
            \Session::flash('message', '登録に失敗しました');
            \Session::flash('message_color', true);
        } else {
            \Session::flash('message', '登録に成功しました');
        }

        return redirect()->route('blog.index');
    }

    public function edit($entry)
    {
        $article = $this->article->getArticleById($entry);
        $article['published_at'] = Carbon::parse($article['published_at'])->format('Y-m-d');

        $all_tags = $this->tag->getAll();

        return view('admin.blog.edit', compact('article', 'all_tags'));
    }

    public function update(ArticleUpdateRequest $request)
    {
        $user_id = $this->guard->user()->id;
        $success_flag = $this->article->saveArticle($request, $user_id);

        if (!$success_flag) {
            \Session::flash('message', '登録に失敗しました');
            \Session::flash('message_color', true);
        } else {
            \Session::flash('message', '登録に成功しました');
        }

        return redirect()->route('blog.index');
    }

    public function destroy($id)
    {
        $this->article->destroyArticle($id);

        \Session::flash('message', '削除に成功しました');

        return redirect()->route('blog.index');
    }

    public function search(Request $requests)
    {
        $articles = $this->article->searchArticle($requests);

        return view('blog.index', compact('articles'));
    }
}
