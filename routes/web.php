<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboradArticleController;
use App\Http\Controllers\DashboradController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\{Route, Auth};
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('article', [ArticleController::class, 'index'])->name('article.index');
Route::get('article/{article:slug}', [ArticleController::class, 'show'])->name('article.show');

Route::prefix('dashboard')->group(function() {
    Route::get('', DashboradController::class)->name('dashboard.index');
    Route::get('article', [DashboradArticleController::class, 'index'])->name('dashboard.article.index');
    Route::post('article', [DashboradArticleController::class, 'store'])->name('dashboard.article.store');
    Route::get('article/create', [DashboradArticleController::class, 'create'])->name('dashboard.article.create');
    Route::get('article/{article:slug}/edit', [DashboradArticleController::class, 'edit'])->name('dashboard.article.edit');
    Route::put('article/{article:slug}', [DashboradArticleController::class, 'update'])->name('dashboard.article.update');
    Route::delete('article/{article:slug}', [DashboradArticleController::class, 'destroy'])->name('dashboard.article.destroy');

    Route::get('category', [CategoryController::class, 'index'])->name('dashboard.category.index');
    Route::get('category/create', [CategoryController::class, 'create'])->name('dashboard.category.create');
    Route::post('category', [CategoryController::class, 'store'])->name('dashboard.category.store');
    Route::get('category/{category:slug}/edit', [CategoryController::class, 'edit'])->name('dashboard.category.edit');
    Route::put('category/{category:slug}', [CategoryController::class, 'update'])->name('dashboard.category.update');
    Route::delete('category/{category:slug}', [CategoryController::class, 'destroy'])->name('dashboard.category.destroy');
});
