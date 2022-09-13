<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Price;

class CheckoutController extends Controller
{
    public function checkout($id)
    {
        if(Auth::check()) {
            $plan = Price::find($id);
            return view('user.pages.checkout', compact('plan'));
        } else {
            $notification = array(
                'message' => 'At first login your Account',
                'alert-type' => 'success',
            );
    
            return redirect()->route('login')->with($notification);
        }
    }
}
