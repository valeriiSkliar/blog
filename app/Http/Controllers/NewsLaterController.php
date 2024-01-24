<?php

namespace App\Http\Controllers;

use App\Services\MailServices\Newsletter;
use Illuminate\Validation\ValidationException;

class NewsLaterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {
        request()->validate(['email' => 'required|email']);
//        dd(request('email'));
        try {

            $newsletter->subscribe(request('email'));

        } catch (\Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'This email could not be added to newsletter list'
            ]);
        }

        return redirect('/')->with([
            'success' => 'You are now singed up for newsletters'
            ]);
    }
}
