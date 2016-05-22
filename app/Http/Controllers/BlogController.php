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
        $logo = 'Blog Manager';
        $articles = Article::latest('published_at')
                        ->published()
                        ->get();

        return view('admin.blog.index', compact('articles', 'logo'));
    }

    public function show(Article $article)
    {
        $logo = 'Article Detail';

        return view('admin.blog.show', compact('article', 'logo'));
    }

    public function create()
    {
        $logo = 'Create New Article';

        return view('admin.blog.create', compact('logo'));
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
        $logo = 'Article Edit';

        return view('admin.blog.edit', compact('article', 'logo'));
    }

    public function update(ArticleRequest $requests)
    {
        $article = Article::findOrfail($requests->id);

        $article->update($requests->all());

        return redirect()->route('blog.index');
    }

    public function destroy($id)
    {
        dd($id);
        Article::destroy($id);

        \Session::flash('message', '削除に成功しました');

        return redirect()->route('blog.index');
    }

    public function search(Request $requests)
    {
        $logo = 'Blog Manager';
        $articles = Article::search($requests);

        return view('admin.blog.index', compact('logo', 'articles'));
    }

}
