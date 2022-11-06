<?php

namespace App\Http\Controllers;

use App\Services\MailchimpNewsletter;
use App\Services\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    // singleaction controller

    public function __invoke(Newsletter $newsletter)
    {

        dd($newsletter);

        request()->validate(['email' => 'required|email']);

        try {
            $newsletter->subscribe(request('email'));

        } catch(\Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'This email could not be added to our email list'
            ]);
        }

        return redirect('/')->with('success', 'you are now signed to our newsletter');
    }
}