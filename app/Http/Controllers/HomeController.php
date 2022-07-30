<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Carbon;
use Image;
use Auth;

class HomeController extends Controller
{
    public function homeSlider()
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
            'description' => $request->description,
            'image' => $last_img,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->route('sliders.home')->with('success', 'Slider Inserted Successfully!');
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
            'description' => 'required|min:25',
        ],
        [
            'title.required' => 'Please, Input Slider Title.',
            'title.min' => 'Slider Title Must Be Longer Than 4 Chars.',
        ]);

        $old_image = $request->old_image;
        $slider_image = $request->file('image');

        if($slider_image) {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($slider_image->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
            $up_location = 'image/slider/';
            $last_img = $up_location.$img_name;
            $slider_image->move($up_location,$img_name);
    
            unlink($old_image);
    
            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $last_img,
                'updated_at' => Carbon::now()
            ]);
    
            return Redirect()->back()->with('success', 'Slider is Updated Successfully!');
        } else {
            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'updated_at' => Carbon::now()
            ]);
    
            return Redirect()->back()->with('success', 'Slider is Updated Successfully!');
        }
        
    }

    public function delete($id)
    {
        $slider = Slider::find($id);
        $old_image = $slider->image;
        unlink($old_image);
        $delete = Slider::find($id)->delete();
        
        return Redirect()->back()->with('success', 'Slider is Deleted Successfully!');
    }
}
