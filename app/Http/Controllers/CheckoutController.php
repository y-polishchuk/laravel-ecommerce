<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Contact;
use App\Models\Price;
use App\Support\Collection;
use App\DataTables\InvoicesDataTable;
use Yajra\DataTables\DataTables;

class CheckoutController extends Controller
{
    public function checkout($id)
    {
        if(Auth::user()) {
            $plan = Price::findOrFail($id);
            $contacts = Contact::first();
            return view('user.pages.checkout', compact('plan', 'contacts'));
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

    public function userInvoices(InvoicesDataTable $dataTable)
    {
        return $dataTable->render('user.pay.invoices');
    }

    public function dataUserInvoices(Request $request)
    {
        $invoices = Auth::user()->invoices();
 
        return DataTables::of($invoices)
        ->addColumn('total', function ($invoice) {
            return $invoice->total();
        })
        ->addColumn('date', function ($invoice) {
            return $invoice->date()->toFormattedDateString();
        })
        ->addColumn('action', function ($invoice) {
            return view('user.pay.action', ['invoice' => $invoice]);
        })
        ->rawColumns(['action'])
        ->toJson();
    }

    public function invoicesPost(Request $request, $invoiceId)
    {
        return $request->user()->downloadInvoice($invoiceId, [
            'vendor' => 'AREY',
            'product' => 'Subscription',
        ]);
    }
}
