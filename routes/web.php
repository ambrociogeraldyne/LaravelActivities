<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('/posts', [PostController::class, 'index'])->middleware('auth.basic');
Route::get('/posts/create', [PostController::class, 'create'])->middleware('auth.basic');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store')->middleware('auth.basic');
Route::get('/posts/{id}', [PostController::class, 'show'])->middleware('auth.basic');
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->middleware('auth.basic');
Route::patch('/posts/{id}', [PostController::class, 'update'])->name('posts.update')->middleware('auth.basic');
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy')->middleware('auth.basic');

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
