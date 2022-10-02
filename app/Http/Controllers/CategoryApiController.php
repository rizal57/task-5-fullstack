<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
    public function index()
    {
        $data = Category::all();
        return response()->json([
            'message' => 'success',
            'data' => $data,
        ]);
    }

    public function show(Category $category)
    {
        return response()->json([
            'message' => 'success',
            'data' => $category
        ]);
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
        ]);
        $cek = Category::where('user_id', auth()->user()->id)->where('name', request()->name)->exists();

        if($cek) {
            return back()->with('filed', 'The name must be unique!!!');
        }

        $data = Category::create([
            'name' => request()->name,
            'slug' => Str::slug(request()->name),
            'user_id' => auth()->user()->id,
        ]);
        return response()->json([
            'message' => 'success',
            'data' => $data
        ]);
    }

    public function update(Category $category)
    {
        request()->validate([
            'name' => 'required',
        ]);
        $cek = Category::where('user_id', auth()->user()->id)->where('name', request()->name)->exists();

        if($cek) {
            return back()->with('filed', 'The name must be unique!!!');
        }

        $data = Category::where('id', $category->id)->update([
            'name' => request()->name,
            'slug' => Str::slug(request()->name),
            'user_id' => auth()->user()->id,
        ]);
        return response()->json([
            'message' => 'success',
            'data' => $data,
        ]);
    }

    public function destroy(Category $category)
    {
        Category::destroy($category->id);
        return response()->json([
            'message' => 'success',
            'data' => null,
        ]);
    }
}
