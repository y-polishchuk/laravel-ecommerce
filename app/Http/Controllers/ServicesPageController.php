<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\HomeService;
use App\Models\Feature;

class ServicesPageController extends Controller
{
    public function services()
    {
        $services = HomeService::all();
        $features = Feature::all();
        return view('pages.services', compact('services', 'features'));
    }

    public function features()
    {
        $features = Feature::all();
        return view('admin.services.features', compact('features'));
    }

    public function adminAddFeature()
    {
        return view('admin.services.create_feature');
    }

    public function adminStoreFeature(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:features',
            'color' => 'required',
            'form' => 'required|unique:features',
        ]);

        Feature::insert([
            'title' => $request->title,
            'color' => $request->color,
            'form' => $request->form,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Feature Is Inserted Successfully!',
            'alert-type' => 'success',
        );

        return Redirect()->route('admin.services.features')->with($notification);
    }

    public function adminEditFeature($id)
    {
        $feature = Feature::findOrFail($id);
        return view('admin.services.edit_feature', compact('feature'));
    }

    public function adminUpdateFeature(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'color' => 'required',
            'form' => 'required',
        ]);

        Feature::find($id)->update([
            'title' => $request->title,
            'color' => $request->color,
            'form' => $request->form
        ]);

        $notification = array(
            'message' => 'Feature Is Updated Successfully!',
            'alert-type' => 'info',
        );

        return Redirect()->route('admin.services.features')->with($notification);
    }

    public function adminDeleteFeature($id)
    {
        $delete = Feature::find($id)->delete();

        $notification = array(
            'message' => 'Feature Is Deleted Successfully!',
            'alert-type' => 'warning',
        );

        return Redirect()->back()->with($notification);
    }
}
