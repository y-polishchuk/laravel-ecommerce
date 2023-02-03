<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Carbon;
use Image;
use Auth;

class HomeController extends Controller
{

    public function adminSlider()
    {
        $sliders = Slider::latest()->get();
        return view('admin.slider.index', compact('sliders'));
    }

    public function add()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:sliders|min:5',
            'page_id' => 'required',
            'description' => 'required|unique:sliders|min:25',
            'image' => 'required|mimes:jpg,jpeg,png',
        ],
        [
            'title.required' => 'Please, Input Slider Title.',
            'title.min' => 'Slider Title Must Be Longer Than 5 Chars.',
        ]);

        $slider_image = $request->file('image');

        $name_gen = hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
        $last_img = 'image/slider/'.$name_gen;
        Image::make($slider_image)->resize(1920,1080)->save($last_img);

        Slider::insert([
            'title' => $request->title,
            'page_id' => $request->page_id,
            'description' => $request->description,
            'image' => $last_img,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Slider Is Inserted Successfully!',
            'alert-type' => 'success',
        );

        return Redirect()->route('sliders.home')->with($notification);
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|min:4',
            'page_id' => 'required',
            'description' => 'required|min:25',
        ],
        [
            'title.required' => 'Please, Input Slider Title.',
            'title.min' => 'Slider Title Must Be Longer Than 4 Chars.',
        ]);

        $slider = Slider::find($id);
        $old_image = $request->old_image;
        $slider_image = $request->file('image');

        if($slider_image) {
            $img_name = hexdec(uniqid()).'.'.strtolower($slider_image->getClientOriginalExtension());
            $path = 'image/slider/'.$img_name;
            Image::make($slider_image->getRealPath())->resize(1920, 1080)->save($path);
            $slider->image = $path;
            $slider->save();
    
            if(file_exists($old_image)) unlink($old_image);
        }
        $slider->update($request->except('image'));
    
        $notification = array(
            'message' => 'Slider Is Updated Successfully!',
            'alert-type' => 'info',
        );

        return Redirect()->back()->with($notification);
        
    }

    public function delete($id)
    {
        $slider = Slider::find($id);
        $old_image = $slider->image;
        if(file_exists($old_image)) unlink($old_image);
        $delete = Slider::find($id)->delete();

        $notification = array(
            'message' => 'Slider Is Deleted Successfully!',
            'alert-type' => 'warning',
        );
        
        return Redirect()->back()->with($notification);
    }
}
