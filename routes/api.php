<?php

use App\Http\Controllers\ArticleApiController;
use App\Http\Controllers\CategoryApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->group(function() {
    Route::get('article', [ArticleApiController::class, 'index'])->name('article.index');
    Route::get('article/{article:slug}', [ArticleApiController::class, 'show'])->name('article.show');
    Route::post('article', [ArticleApiController::class, 'store'])->name('article.store');
    Route::put('article/{article:slug}', [ArticleApiController::class, 'update'])->name('article.update');
    Route::delete('article/{article:slug}', [ArticleApiController::class, 'destroy'])->name('article.destroy');

    Route::get('category', [CategoryApiController::class, 'index'])->name('category.index');
    Route::get('category/{category:slug}', [CategoryApiController::class, 'show'])->name('category.show');
    Route::post('category', [CategoryApiController::class, 'store'])->name('category.store');
    Route::put('category/{category:slug}', [CategoryApiController::class, 'update'])->name('category.update');
    Route::delete('category/{category:slug}', [CategoryApiController::class, 'destroy'])->name('category.destroy');
});
