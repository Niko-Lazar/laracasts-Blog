<?php

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

Route::GET('admin/posts/create', [PostController::class, 'create'])->middleware('admin');
