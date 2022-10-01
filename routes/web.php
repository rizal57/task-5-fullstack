<?php

use App\Http\Controllers\ArticleController;
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
Route::get('dashboard', DashboradController::class)->name('dashboard.index');
Route::get('dashboard/article', [DashboradArticleController::class, 'index'])->name('dashboard.article.index');
Route::post('dashboard/article', [DashboradArticleController::class, 'store'])->name('dashboard.article.store');
Route::get('dashboard/article/create', [DashboradArticleController::class, 'create'])->name('dashboard.article.create');
Route::get('dashboard/article/{article:slug}/edit', [DashboradArticleController::class, 'edit'])->name('dashboard.article.edit');
Route::put('dashboard/article/{article:slug}', [DashboradArticleController::class, 'update'])->name('dashboard.article.update');
Route::delete('dashboard/article/{article:slug}', [DashboradArticleController::class, 'destroy'])->name('dashboard.article.destroy');
