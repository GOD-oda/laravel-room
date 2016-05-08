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
        $logo = '管理画面';
        $articles = Article::all();

        return view('admin.index', compact('articles', 'logo'));
    }

    public function show(Article $article)
    {
        $logo = '詳細画面';

        return view('admin.show', compact('article', 'logo'));
    }

    public function create()
    {
        $logo = '新規作成画面';

        return view('admin.create', compact('logo'));
    }

    public function store(ArticleRequest $requests)
    {
        $input = $requests->all();
        $input['published_at'] = Carbon::now();

        Article::create($input);

        return redirect('admin');
    }

    public function edit(Article $article)
    {
        $logo = '編集画面';

        return view('admin.edit', compact('article', 'logo'));
    }

    public function update(ArticleRequest $requests)
    {
        $article = Article::findOrfail($requests->id);

        $article->update($requests->all());

        return redirect()->route('admin.index');
    }

}
