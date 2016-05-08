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
        $articles = Article::all();

        return view('admin.index', compact('articles', 'logo'));
    }

    public function show(Article $article)
    {
        $logo = 'Article Detail';

        return view('admin.show', compact('article', 'logo'));
    }

    public function create()
    {
        $logo = 'Create New Article';

        return view('admin.create', compact('logo'));
    }

    public function store(ArticleRequest $requests)
    {
        $input = $requests->all();
        $input['published_at'] = Carbon::now();

        Article::create($input);

        return redirect('blog');
    }

    public function edit(Article $article)
    {
        $logo = 'Article Edit';

        return view('admin.edit', compact('article', 'logo'));
    }

    public function update(ArticleRequest $requests)
    {
        $article = Article::findOrfail($requests->id);

        $article->update($requests->all());

        return redirect()->route('blog.index');
    }

}
