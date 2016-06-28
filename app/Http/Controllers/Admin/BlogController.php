<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Services\ArticleService;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Controllers\Controller;
use App\DataAccess\Eloquent\Article;
use App\Http\Requests\ArticleStoreRequest;
use App\Http\Requests\ArticleUpdateRequest;

class BlogController extends Controller
{
    protected $article;
    protected $guard;

    public function __construct(ArticleService $article, Guard $guard)
    {
        $this->article = $article;
        $this->guard = $guard;
        $this->middleware('exists.article', ['only' => ['show', 'edit', 'update']]);
        //$this->middleware('self.entry', ['only' => ['show', 'edit', 'update']]);
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
        return view('admin.blog.create');
    }

    public function store(ArticleStoreRequest $request)
    {
        $input = $request->all();
        $input['published_at'] =
            $input['published_at'] . ' ' . Carbon::now()->toTimeString();
        $input['user_id'] = $this->guard->user()->id;

        $this->article->saveArticle($input);

        \Session::flash('message', '登録に成功しました');

        return redirect()->route('admin.blog.index');
    }

    public function edit($entry)
    {
        $article = $this->article->getArticle($entry);
        $article['published_at'] = Carbon::parse($article['published_at'])->format('Y-m-d');

        return view('admin.blog.edit', compact('article'));
    }

    public function update(ArticleUpdateRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = $this->guard->user()->id;
        $input['published_at'] =
            $input['published_at'] . ' ' . Carbon::now()->toTimeString();

        $this->article->saveArticle($input);

        \Session::flash('message', '編集に成功しました');

        return redirect()->route('admin.blog.index');
    }

    public function destroy($id)
    {
        $this->article->destroyArticle($id);

        \Session::flash('message', '削除に成功しました');

        return redirect()->route('admin.blog.index');
    }

    public function search(Request $requests)
    {
        $articles = Article::search($requests);

        return view('admin.blog.index', compact('articles'));
    }

}
