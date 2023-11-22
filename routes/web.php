<?php

use App\Http\Controllers\admin\ArticleController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\TagController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\Front\ArticleController as FrontArticleController;
use App\Http\Controllers\Front\CategoryController as FrontCategoryController;
use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class,'index']);
Route::get('/about',[HomeController::class,'about']);
Route::get('/articles/{slug}',[FrontArticleController::class,'show']);
Route::get('/articles',[FrontArticleController::class,'index']);
Route::get('/category/{slug}',[FrontCategoryController::class,'show']);
Route::post('/articles/search',[FrontArticleController::class,'index'])->name('search');

Route::middleware('auth')->group(function () {
    Route::resource('/categories', CategoryController::class)->middleware('UserAccess:1');
    Route::resource('/users', UserController::class);
    Route::resource('/tag', TagController::class)->middleware('UserAccess:1');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/article/restore', [ArticleController::class, 'tampil_hapus'])->name('article.tampil_hapus');
    Route::get('/article/restore/{id}', [ArticleController::class, 'restore'])->name('article.restore');
    Route::delete('/article/restore/delete/{id}', [ArticleController::class, 'forceDelete'])->name('article.forceDelete');
    Route::resource('/article', ArticleController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
