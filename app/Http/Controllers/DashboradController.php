<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboradController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('dashboard.index', [
            'title' => "Dashboard",
            'articles' => Article::where('user_id', auth()->user()->id)->get(),
            'categories' => Category::where('user_id', auth()->user()->id)->get(),
        ]);
    }
}
