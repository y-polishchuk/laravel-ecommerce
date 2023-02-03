<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Price;
use App\Support\Collection;

class CheckoutController extends Controller
{
    public function checkout($id)
    {
        if(Auth::user()) {
            $plan = Price::findOrFail($id);
            return view('user.pages.checkout', compact('plan'));
        } else {
            return redirect()->route('login');
        }
    }

    public function paymentPage(Request $request)
    {
        if(isset($request->price_id) and $request->price_id !== 'none') {
            return view('user.pay.payment',[ 
                'intent' => Auth::user()->createSetupIntent(),
                'price_id' => $request->price_id,
            ]);
        } else {
            $notification = array(
                'message' => "You've Subscribed Successfully For Free Plan.",
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        }
    }

    public function payment(Request $request)
    {
        Auth::user()->newSubscription('plans', $request->price_id)->create($request->paymentMethod);

        $notification = array(
            'message' => "You've Subscribed Successfully For Charging Plan.",
            'alert-type' => 'success',
        );
        return redirect('dashboard')->with($notification);
    }

    public function unsubscribe(Request $request)
    {
        Auth::user()->subscription('plans')->cancel();

        $notification = array(
            'message' => "You've Cancelled Subscribtion For Charging Plan.",
            'alert-type' => 'info',
        );
        return redirect('invoices')->with($notification);
    }

    public function invoices()
    {
        $invoices = Auth::user()->invoices();
        $pagination = (new Collection($invoices))->paginate();
        return view('user.pay.invoices',[ 
            'invoices' => $pagination,
        ]);
    }

    public function invoicesPost(Request $request, $invoiceId)
    {
        return $request->user()->downloadInvoice($invoiceId, [
            'vendor' => 'AREY',
            'product' => 'Plan Subscription',
        ]);
    }
}
