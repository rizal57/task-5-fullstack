<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return view('articles.index', [
            'title' => "Articel",
            'articles' => Article::latest()->paginate(6),
        ]);
    }

    public function show(Article $article)
    {
        return view('articles.show', [
            'title' => "Article",
            'article' => $article,
        ]);
    }
}
