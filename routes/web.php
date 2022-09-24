<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::GET('/add-blog',[BlogController::class,'addBlog'])->name('blog.add');
Route::POST('/show-blog',[BlogController::class,'blogStore'])->name('blog.all');

Route::GET('all-blogs',[BlogController::class,'allBlogs'])->name('allblogs');

Route::GET('status/{id}',[BlogController::class,'statusUpdate'])->name('blog.status');
Route::GET('delete-post/{id}',[BlogController::class,'deletePost'])->name('blog.delete');

Route::GET('update-post/{id}',[BlogController::class,'editPost'])->name('blog.update');

Route::PUT('updated-data/{id}',[BlogController::class,'updateData'])->name('blog.data');

Route::GET('show-full-post/{id}',[BlogController::class,'viewFullPost'])->name('show.post');
