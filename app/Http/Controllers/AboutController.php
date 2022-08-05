<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\HomeAbout;

class AboutController extends Controller
{
    public function homeAbout()
    {
        $homeabout = HomeAbout::latest()->get();
        return view('admin.home.index', compact('homeabout'));
    }

    public function addAbout()
    {
        $homeabout = HomeAbout::latest()->get();
        return view('admin.home.create', compact('homeabout'));
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

        HomeAbout::insert([
            'title' => $request->title,
            'short_des' => $request->short_des,
            'long_des' => $request->long_des,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'About Is Inserted Successfully!',
            'alert-type' => 'success',
        );

        return Redirect()->route('about.home')->with($notification);
    }

    public function edit($id)
    {
        $homeabout = HomeAbout::findOrFail($id);
        return view('admin.home.edit', compact('homeabout'));
    }

    public function update(Request $request, $id)
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

        HomeAbout::find($id)->update([
            'title' => $request->title,
            'short_des' => $request->short_des,
            'long_des' => $request->long_des
        ]);

        $notification = array(
            'message' => 'About Is Updated Successfully!',
            'alert-type' => 'info',
        );

        return Redirect()->route('about.home')->with($notification);
    }

    public function delete($id)
    {
        $delete = HomeAbout::find($id)->delete();

        $notification = array(
            'message' => 'About Is Deleted Successfully!',
            'alert-type' => 'warning',
        );

        return Redirect()->back()->with($notification);
    }
}
