<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Services\ArticleService;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;

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
//        $articles = Article::latest()->get();
        $articles = $this->article
            ->getPage($request->get('page', 1), 20)
            ->setPath($request->getBasePath());

        return view('admin.blog.index', compact('articles'));
    }

    public function show($id)
    {
        $article = $this->article->getArticle($id);

        return view('admin.blog.show', compact('article'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(ArticleRequest $requests)
    {
        $input = $requests->all();
        $input['published_at'] =
            $input['published_at'] . ' ' . Carbon::now()->toTimeString();

        $input['user_id'] = $this->guard->user()->id;

        $this->article->addArticle($input); // Article::create($input);と同じことをやっている
        //Article::create($input);

        \Session::flash('message', '登録に成功しました');

        return redirect('blog');
    }

    public function edit($id)
    {
        $articles = $this->article->getArticle($id);

        return view('admin.blog.edit', compact('article'));
    }

    public function update(ArticleRequest $requests)
    {
        $article = Article::findOrfail($requests->id);

        $article->update($requests->all());

        return redirect()->route('blog.index');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        \Session::flash('message', '削除に成功しました');

        return redirect()->route('blog.index');
    }

    public function search(Request $requests)
    {
        $articles = Article::search($requests);

        return view('admin.blog.index', compact('articles'));
    }

}
