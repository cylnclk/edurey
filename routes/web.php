<?php

use App\Http\Controllers\GoogleSocialiteController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//post
Route::get('/',[PostController::class, 'welcome'])->name('welcome');
Route::get('posts',[PostController::class ,'index'])->name('post.index');
Route::get('posts/anyData', [PostController::class, 'anyData'])->name('post.data');
Route::get('/post/add', [PostController::class, 'create'])->name('post.add');
Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
Route::get('/post/edit/{id}', [PostController::class,'edit'])->name('post.edit');
Route::post('/post/edit/{id}', [PostController::class, 'update'])->name('post.update');
Route::get('/post/delete/{id}', [PostController::class, 'destroy'])->name('post.delete');

Route::get('auth/google/', [GoogleSocialiteController::class, 'redirectToGoogle']);
Route::get('callback/google', [GoogleSocialiteController::class, 'handleCallback']);
