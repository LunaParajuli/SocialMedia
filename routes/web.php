<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/home',[AdminController::class,'index']);

Route::get('/post',[PostController::class,'post'])->name('content.post');
Route::get('/create',[PostController::class,'create'])->name('content.create');
Route::post('/post/create',[PostController::class,'store'])->name('content.store');

Route::get('/postindex',[PostController::class,'postindex'])->name('content.postindex');
Route::get('/post/{post}/show',[PostController::class,'show'])->name('content.show');
Route::get('/post/{post}/edit',[PostController::class,'edit'])->name('content.edit');
Route::post('/post/{post}/update',[PostController::class,'update'])->name('content.update');
Route::delete('/post/{post}/delete',[PostController::class,'destroy'])->name('content.destroy');


Route::get('comment', [CommentController::class, 'editComment'])->name('comment.edit');
Route::post('comment/store', [CommentController::class, 'storeComment'])->name('comment.store');

