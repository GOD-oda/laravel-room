<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Article;
use App\User;
use Carbon\Carbon;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('exists.article:entry', ['only' => ['show']]);
    }

    public function index()
    {
        $articles = Article::latest()->published()->get();

        return view('articles.index', compact('articles'));
    }

    public function show($id)
    {
        return view('articles.show', compact('article'));
    }
}