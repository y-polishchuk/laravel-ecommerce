<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\HomeService;

class ServiceController extends Controller
{
    public function homeService()
    {
        $homeservice = HomeService::latest()->get();
        return view('admin.home_service.index', compact('homeservice'));
    }

    public function addService()
    {
        $homeservice = HomeService::latest()->get();
        return view('admin.home_service.create', compact('homeservice'));
    }

    public function storeService(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:home_services|min:5',
            'description' => 'required|unique:home_services|min:25',
            'icon_color' => 'required|unique:home_services',
            'icon_form' => 'required|unique:home_services',
        ],
        [
            'title.required' => 'Please, Input HomeService Title.',
            'title.min' => 'HomeService Title Must Be Longer Than 5 Chars.',
        ]);

        HomeService::insert([
            'title' => $request->title,
            'description' => $request->description,
            'icon_color' => strtolower($request->icon_color),
            'icon_form' => strtolower($request->icon_form),
            'created_at' => Carbon::now()
        ]);

        return Redirect()->route('services.home')->with('success', 'Service is Inserted Successfully!');
    }

    public function edit($id)
    {
        $homeservice = HomeService::findOrFail($id);
        return view('admin.home_service.edit', compact('homeservice'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|min:5',
            'description' => 'required|min:25',
            'icon_color' => 'required',
            'icon_form' => 'required',
        ],
        [
            'title.required' => 'Please, Input HomeService Title.',
            'title.min' => 'HomeService Title Must Be Longer Than 5 Chars.',
        ]);

        HomeService::find($id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'icon_color' => strtolower($request->icon_color),
            'icon_form' => strtolower($request->icon_form),
        ]);

        return Redirect()->route('services.home')->with('success', 'Service is Updated Successfully!');
    }

    public function delete($id)
    {
        $delete = HomeService::find($id)->delete();
        return Redirect()->back()->with('success', 'Service is Deleted Successfully!');
    }
}
