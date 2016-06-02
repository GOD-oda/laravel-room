<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Article;
use App\User;
use Carbon\Carbon;

class ArticlesController extends Controller
{
    private $now;

    public function __construct()
    {
        $this->now = Carbon::now();
    }

    public function getIndex()
    {
        $articles = Article::latest()->published()->get();

        return view('articles.index', compact('articles'));
    }

    public function getShow($id)
    {
        $article = Article::findOrFail($id);

        if ($article->published_at > $this->now) {
            return abort(503);
        }

        return view('articles.show', compact('article'));
    }
}