<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Validation\ValidationException;
use App\Services\Newsletter;


class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {
        request()->validate(['email'=>'required|email']);
    
    try {
        $newsletter->subscribe(request('email'));
    } catch (Exception $e) {
        throw ValidationException::withMessages([
            'email'=>'This email could not be added to our newsletter list.'
        ]);
    }
    
    $notification = array(
        'message' => 'You are now signed up for our Newsletters!',
        'alert-type' => 'success',
    );

    return redirect()->route('home')->with($notification);
    }
}
