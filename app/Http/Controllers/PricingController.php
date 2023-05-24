<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Price;
use App\Models\FAQ;
use App\DataTables\PricesDataTable;
use Yajra\DataTables\DataTables;

class PricingController extends Controller
{
    public function pricing()
    {
        $prices = Price::all();
        $faqs = FAQ::all();
        return view('pages.pricing', compact('prices', 'faqs'));
    }

    public function adminPrices(PricesDataTable $dataTable)
    {
        return $dataTable->render('admin.pricing.price.prices');
    }

    public function dataPrices(Request $request)
    {
        $prices = Price::get();
 
        return DataTables::of($prices)
        ->editColumn('features', function ($price) {
            return strip_tags($price->features);
        })
        ->addColumn('action', function ($price) {
            return view('admin.pricing.price.action', ['price' => $price]);
        })
        ->rawColumns(['action'])
        ->toJson();
    }

    public function adminAddPrice()
    {
        return view('admin.pricing.price.create_price');
    }

    public function adminStorePrice(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'price_id' => 'required',
            'price' => 'required',
            'features' => 'required',
            'advanced' => 'required'
        ]);

 
        Price::insert([
            'title' => $request->title,
            'price_id' => $request->price_id,
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

    public function adminEditPrice(Price $price)
    {
        return view('admin.pricing.price.edit_price', compact('price'));
    }

    public function adminUpdatePrice(Request $request, Price $price)
    {
        $validated = $request->validate([
            'title' => 'required',
            'price_id' => 'required',
            'price' => 'required',
            'features' => 'required',
            'advanced' => 'required'
        ]);

        $price->update([
            'title' => $request->title,
            'price_id' => $request->price_id,
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

    public function adminDeletePrice(Price $price)
    {
        $price->delete();

        $notification = array(
            'message' => 'Price Is Deleted Successfully!',
            'alert-type' => 'warning',
        );

        return Redirect()->back()->with($notification);
    }
}
