<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Price;
use App\Models\FAQ;

class PricingController extends Controller
{
    public function pricing()
    {
        $prices = Price::all();
        $faqs = FAQ::all();
        return view('pages.pricing', compact('prices', 'faqs'));
    }

    public function adminPricing()
    {
        $prices = Price::all();
        return view('admin.pricing.prices', compact('prices'));
    }

    public function adminAddPrice()
    {
        return view('admin.pricing.create_price');
    }

    public function adminStorePrice(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'price' => 'required',
            'features' => 'required',
            'advanced' => 'required'
        ]);

        Price::insert([
            'title' => $request->title,
            'price' => $request->price,
            'features' => $request->features,
            'advanced' => $request->advanced,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Price Is Inserted Successfully!',
            'alert-type' => 'success',
        );

        return Redirect()->route('admin.pricing')->with($notification);
    }

    public function adminEditPrice($id)
    {
        $price = Price::findOrFail($id);
        return view('admin.pricing.edit_price', compact('price'));
    }

    public function adminUpdatePrice(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'price' => 'required',
            'features' => 'required',
            'advanced' => 'required'
        ]);

        Price::find($id)->update([
            'title' => $request->title,
            'price' => $request->price,
            'features' => $request->features,
            'advanced' => $request->advanced,
            'updated_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Price Is Updated Successfully!',
            'alert-type' => 'info',
        );

        return Redirect()->route('admin.pricing')->with($notification);
    }

    public function adminDeletePrice($id)
    {
        $delete = Price::find($id)->delete();

        $notification = array(
            'message' => 'Price Is Deleted Successfully!',
            'alert-type' => 'warning',
        );

        return Redirect()->back()->with($notification);
    }
}
