<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Services\Newsletter;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

Route::GET('/', [PostController::class, 'index'])->name('home');

Route::GET('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::POST('newsletter', NewsletterController::class);

Route::GET('register', [RegisterController::class, 'create'])->middleware('guest');
Route::POST('register', [RegisterController::class, 'store'])->middleware('guest');

Route::GET('login', [SessionsController::class, 'create'])->middleware('guest');
Route::POST('sessions', [SessionsController::class, 'store'])->middleware('guest');
Route::POST('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::middleware('can:admin')->group(function() {
    Route::POST('admin/posts', [AdminPostController::class, 'store']);
    Route::GET('admin/posts/create', [AdminPostController::class, 'create']);
    Route::GET('admin/posts', [AdminPostController::class, 'index']);
    Route::GET('admin/posts/{post}/edit', [AdminPostController::class, 'edit']);
    Route::patch('admin/posts/{post}', [AdminPostController::class, 'update']);
    Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy']);
});

