<?php

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

Route::get('dashboard', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');

Route::group(['middleware' => ['auth']], function () {

    // Route::get('dashboard', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');

    Route::get('create-post', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
    Route::post('create-post', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
    Route::get('post/{post}/detail', [App\Http\Controllers\PostController::class, 'show'])->name('post.show');
    Route::get('post/{post}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
    Route::post('post/{post}/edit', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');
    Route::post('post/{post}/delete', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy');

    Route::get('create-category', [App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
    Route::post('create-category', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
    Route::post('category/{category}/delete', [App\Http\Controllers\CategoryController::class, 'delete'])->name('category.destroy');
});
