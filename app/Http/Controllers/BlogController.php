<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use App\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $articles = Article::latest()->get();

        return view('admin.blog.index', compact('articles'));
    }

    public function show(Article $article)
    {
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

        Article::create($input);

        \Session::flash('message', '登録に成功しました');

        return redirect('blog');
    }

    public function edit(Article $article)
    {
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
