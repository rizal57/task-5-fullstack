<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;

class DashboradArticleController extends Controller
{
    public function index()
    {
        return view('dashboard.articles.index', [
            'title' => "Article",
            'articles' => Article::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.articles.create', [
            'title' => "Create Article",
            'categories' => Category::all(),
        ]);
    }

    public function store()
    {
        request()->validate([
            'title' => 'required|unique:articles,title',
            'content' => 'required',
            'category_id' => 'required',
            'image' => 'file|image',
        ]);

        Article::create([
            'title' => request('title'),
            'slug' => Str::slug(request('title')),
            'content' => request('content'),
            'excerpt' => Str::limit(request('content'), 200, '...'),
            'user_id' => auth()->user()->id,
            'category_id' => request('category_id'),
            'image' => request('image'),
        ]);
        return redirect(route('dashboard.article.index'))->with('success', 'Article has been created!!!');
    }

    public function edit(Article $article)
    {
        return view('dashboard.articles.edit', [
            'title' => "Edit Article",
            'article' => $article,
            'categories' => Category::all(),
        ]);
    }

    public function update(Article $article)
    {
        request()->validate([
            'title' => 'required|unique:articles,title,' . $article->id,
            'content' => 'required',
            'category_id' => 'required',
            'image' => 'file|image',
        ]);

        Article::where('id', $article->id)->update([
            'title' => request('title'),
            'slug' => Str::slug(request('title')),
            'content' => request('content'),
            'excerpt' => Str::limit(request('content'), 200, '...'),
            'user_id' => auth()->user()->id,
            'category_id' => request('category_id'),
            'image' => request('image'),
        ]);
        return redirect(route('dashboard.article.index'))->with('success', 'Article has been updated');
    }

    public function destroy(Article $article)
    {
        Article::destroy($article->id);
        return back()->with('success', 'Article has been deleted!!!');
    }
}
