<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ArticleApiController extends Controller
{
    public function index()
    {
        $data = Article::all();
        return response()->json([
            'message' => 'success',
            'data' => $data,
        ]);
    }

    public function show(Article $article)
    {
        return response()->json([
            'message' => 'success',
            'data' => $article,
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

        $data = Article::create([
            'title' => request('title'),
            'slug' => Str::slug(request('title')),
            'content' => request('content'),
            'excerpt' => Str::limit(request('content'), 200, '...'),
            'user_id' => auth()->user()->id,
            'category_id' => request('category_id'),
            'image' => request('image'),
        ]);
        return response()->json(['message' => 'success', 'data' => $data]);
    }

    public function update(Article $article)
    {
        request()->validate([
            'title' => 'required|unique:articles,title,' . $article->id,
            'content' => 'required',
            'category_id' => 'required',
            'image' => 'file|image',
        ]);

        $data = Article::where('id', $article->id)->update([
            'title' => request('title'),
            'slug' => Str::slug(request('title')),
            'content' => request('content'),
            'excerpt' => Str::limit(request('content'), 200, '...'),
            'user_id' => auth()->user()->id,
            'category_id' => request('category_id'),
            'image' => request('image'),
        ]);
        return response()->json(['message' => 'success', 'data' => $data]);
    }

    public function destroy(Article $article)
    {
        Article::destroy($article->id);
        return response()->json([
            'message' => 'Delete Success',
            'data' => null,
        ]);
    }
}
