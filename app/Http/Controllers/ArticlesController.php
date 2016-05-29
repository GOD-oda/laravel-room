<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Article;
use App\User;

class ArticlesController extends Controller
{
    public function getIndex()
    {
        $articles = Article::latest()->get();

        return view('articles.index', compact('articles'));
    }

    public function getShow($id)
    {
        $article = Article::findOrFail($id);

        return view('articles.show', compact('article'));
    }
}
