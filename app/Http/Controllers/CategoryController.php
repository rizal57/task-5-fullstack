<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('dashboard.categories.index', [
            'title' => "Category",
            'categories' => Category::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.categories.create', [
            'title' => "Create Category"
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

        Category::create([
            'name' => request()->name,
            'slug' => Str::slug(request()->name),
            'user_id' => auth()->user()->id,
        ]);
        return redirect(route('dashboard.category.index'))->with('success', 'Category has been created!!!');
    }

    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', [
            'title' => "Edit Category",
            'category' => $category,
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

        Category::where('id', $category->id)->update([
            'name' => request()->name,
            'slug' => Str::slug(request()->name),
            'user_id' => auth()->user()->id,
        ]);
        return redirect(route('dashboard.category.index'))->with('success', 'Category has been updated!!!');
    }

    public function destroy(Category $category)
    {
        Category::destroy($category->id);
        return redirect(route('dashboard.category.index'))->with('success', 'Category has been deleted!!!');
    }
}
