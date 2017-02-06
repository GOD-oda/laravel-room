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
use Response;

class BlogController extends Controller
{
    protected $article;
    protected $guard;

    public function __construct(ArticleService $article, Guard $guard)
    {
        $this->article = $article;
        $this->guard = $guard;
        $this->middleware('exists.articleById', ['only' => ['show', 'edit', 'update']]);
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
        $user_id = $this->guard->user()->id;
        $success_flag = $this->article->saveArticle($request, $user_id);

        if (! $success_flag) {
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

        $tags = $this->article->getTagsOnArticle($entry);

        return view('admin.blog.edit', compact('article', 'tags'));
    }

    public function update(ArticleUpdateRequest $request)
    {
        $user_id = $this->guard->user()->id;
        $success_flag = $this->article->saveArticle($request, $user_id);

        if (! $success_flag) {
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

    public function deleteTag(Request $request)
    {
        $result = $this->article->destroyTag($request->article_id, $request->tag_name);

        return Response::json($result);
    }

}
