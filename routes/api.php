<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('user/posts', fn () => auth()->user()->posts);

    Route::post('posts', [PostController::class, 'store'])->name('posts.store');
    Route::patch('posts/{post}', [PostController::class, 'update'])->name('posts.update');
});

Route::get('posts', [PostController::class, 'index'])->name('posts.index');
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');
