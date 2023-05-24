<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeService;
use App\DataTables\ServicesDataTable;
use Yajra\DataTables\DataTables;

class ServiceController extends Controller
{
    public function adminService(ServicesDataTable $dataTable)
    {
        return $dataTable->render('admin.home_service.index');
    }

    public function dataService(Request $request)
    {
        $services = HomeService::get();
 
        return DataTables::of($services)
        ->editColumn('description', function ($service) {
            return strip_tags($service->description);
        })
        ->addColumn('action', function ($service) {
            return view('admin.home_service.action', ['service' => $service]);
        })
        ->rawColumns(['action'])
        ->toJson();
    }

    public function addService(HomeService $service)
    {
        $service->latest();
        return view('admin.home_service.create', compact('service'));
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

        HomeService::create([
            'title' => $request->title,
            'description' => $request->description,
            'icon_color' => strtolower($request->icon_color),
            'icon_form' => strtolower($request->icon_form),
        ]);

        $notification = array(
            'message' => 'Service Is Created Successfully!',
            'alert-type' => 'success',
        );

        return Redirect()->route('services.admin')->with($notification);
    }

    public function edit(HomeService $service)
    {
        return view('admin.home_service.edit', compact('service'));
    }

    public function update(Request $request, HomeService $service)
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

        $service->update([
            'title' => $request->title,
            'description' => $request->description,
            'icon_color' => strtolower($request->icon_color),
            'icon_form' => strtolower($request->icon_form),
        ]);

        $notification = array(
            'message' => 'Service Is Updated Successfully!',
            'alert-type' => 'info',
        );

        return Redirect()->route('services.admin')->with($notification);
    }

    public function delete(HomeService $service)
    {
        $service->delete();

        $notification = array(
            'message' => 'Service Is Deleted Successfully!',
            'alert-type' => 'warning',
        );

        return Redirect()->back()->with($notification);
    }
}
