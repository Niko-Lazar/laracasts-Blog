<?php

use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

Route::POST('newsletter', function() {
    request()->validate(['email' => 'required|email']);

    $mailchimp = new \MailchimpMarketing\ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us21'
    ]);

    try {
        $response = $mailchimp->lists->addListMember('ade03f87e7', [
            'email_address' => request('email'),
            'status' => 'subscribed'
        ]);
    } catch(\Exception $e) {
        throw \Illuminate\Validation\ValidationException::withMessages([
           'email' => 'This email could not be added to our email list'
        ]);
    }

    return redirect('/')->with('success', 'you are now signed to our newsletter');
});

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::POST('register', [RegisterController::class, 'store'])->middleware('guest');

Route::GET('login', [SessionsController::class, 'create'])->middleware('guest');
Route::POST('sessions', [SessionsController::class, 'store'])->middleware('guest');
Route::POST('logout', [SessionsController::class, 'destroy'])->middleware('auth');


