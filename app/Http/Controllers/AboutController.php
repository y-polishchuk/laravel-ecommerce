<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeAbout;
use App\DataTables\AboutDataTable;
use Yajra\DataTables\DataTables;

class AboutController extends Controller
{
    public function adminAbout(AboutDataTable $dataTable)
    {
        return $dataTable->render('admin.home_about.index');
    }

    public function dataAbout(Request $request)
    {
        $abouts = HomeAbout::get();
 
        return DataTables::of($abouts)
        ->editColumn('short_des', function ($about) {
            return $about->limitIntro();
        })
        ->editColumn('long_des', function ($about) {
            return $about->limitText();
        })
        ->addColumn('action', function ($about) {
            return view('admin.home_about.action', ['about' => $about]);
        })
        ->rawColumns(['action'])
        ->toJson();
    }

    public function addAbout()
    {
        $about = HomeAbout::latest()->get();
        return view('admin.home_about.create', compact('about'));
    }

    public function storeAbout(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:home_abouts|min:5',
            'short_des' => 'required|unique:home_abouts|min:25',
            'long_des' => 'required|unique:home_abouts|min:55',
        ],
        [
            'title.required' => 'Please, Input HomeAbout Title.',
            'title.min' => 'HomeAbout Title Must Be Longer Than 5 Chars.',
        ]);

        HomeAbout::create([
            'title' => $request->title,
            'short_des' => $request->short_des,
            'long_des' => $request->long_des,
        ]);

        $notification = array(
            'message' => 'About Section Is Created Successfully!',
            'alert-type' => 'success',
        );

        return Redirect()->route('about.admin')->with($notification);
    }

    public function edit(HomeAbout $about)
    {
        return view('admin.home_about.edit', compact('about'));
    }

    public function update(Request $request, HomeAbout $about)
    {
        $validated = $request->validate([
            'title' => 'required|min:5',
            'short_des' => 'required|min:25',
            'long_des' => 'required|min:55',
        ],
        [
            'title.required' => 'Please, Input Title.',
            'title.min' => 'Title Must Be Longer Than 5 Chars.',
        ]);

        $about->update([
            'title' => $request->title,
            'short_des' => $request->short_des,
            'long_des' => $request->long_des
        ]);

        $notification = array(
            'message' => 'About Is Updated Successfully!',
            'alert-type' => 'info',
        );

        return Redirect()->route('about.admin')->with($notification);
    }

    public function delete(HomeAbout $about)
    {
        $about->delete();

        $notification = array(
            'message' => 'About Section Is Deleted Successfully!',
            'alert-type' => 'warning',
        );

        return Redirect()->back()->with($notification);
    }
}
