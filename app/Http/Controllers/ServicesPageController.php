<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\HomeService;
use App\Models\Feature;
use App\DataTables\FeaturesDataTable;
use Yajra\DataTables\DataTables;

class ServicesPageController extends Controller
{
    public function services()
    {
        $services = HomeService::all();
        $features = Feature::all();
        return view('pages.services', compact('services', 'features'));
    }

    public function adminFeatures(FeaturesDataTable $dataTable)
    {
        return $dataTable->render('admin.services.features');
    }

    public function dataFeatures(Request $request)
    {
        $features = Feature::get();
 
        return DataTables::of($features)
        ->addColumn('action', function ($feature) {
            return view('admin.services.action', ['feature' => $feature]);
        })
        ->rawColumns(['action'])
        ->toJson();
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

    public function adminEditFeature(Feature $feature)
    {
        return view('admin.services.edit_feature', compact('feature'));
    }

    public function adminUpdateFeature(Request $request, Feature $feature)
    {
        $validated = $request->validate([
            'title' => 'required',
            'color' => 'required',
            'form' => 'required',
        ]);

        $feature->update([
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

    public function adminDeleteFeature(Feature $feature)
    {
        $feature->delete();

        $notification = array(
            'message' => 'Feature Is Deleted Successfully!',
            'alert-type' => 'warning',
        );

        return Redirect()->back()->with($notification);
    }
}
