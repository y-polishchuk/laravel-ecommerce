<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Testimonial;
use Image;

class TestimonialController extends Controller
{
    public function aboutTes()
    {
        $testimonials = Testimonial::all();
        return view('pages.testimonials', compact('testimonials'));
    }

    public function tes()
    {
        $testimonials = Testimonial::all();
        return view('admin.about.testimonials', compact('testimonials'));
    }

    public function adminAddTes()
    {
        return view('admin.about.create_tes');
    }

    public function adminStoreTes(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'position' => 'required',
            'text' => 'required',
            'photo' => 'required|mimes:jpg,jpeg,png',
        ]);

        $tes_photo = $request->file('photo');

        $name_gen = hexdec(uniqid()).'.'.$tes_photo->getClientOriginalExtension();
        $last_img = 'image/testims/'.$name_gen;
        Image::make($tes_photo)->fit(500, 500)->save($last_img);

        Testimonial::insert([
            'name' => $request->name,
            'position' => $request->position,
            'text' => $request->text,
            'photo' => $last_img,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Testimonial Is Inserted Successfully!',
            'alert-type' => 'success',
        );

        return Redirect()->route('admin.tes')->with($notification);
    }

    public function adminEditTes($id)
    {
        $tes = Testimonial::findOrFail($id);
        return view('admin.about.edit_tes', compact('tes'));
    }

    public function adminUpdateTes(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'position' => 'required',
            'text' => 'required',
            'photo' => 'mimes:jpg,jpeg,png',
        ]);

        $tes = Testimonial::find($id);
        $old_image = $request->old_image;
        $tes_photo = $request->file('photo');

        if($tes_photo) {
        $name_gen = hexdec(uniqid()).'.'.$tes_photo->getClientOriginalExtension();
        $path = 'image/testims/'.$name_gen;
        Image::make($tes_photo->getRealPath())->fit(400, 400)->save($path);
        $tes->photo = $path;
        $tes->save();
    
        unlink($old_image);
        }
        $tes->update($request->except('photo'));

        $notification = array(
            'message' => 'Testimonial Is Updated Successfully!',
            'alert-type' => 'info',
        );

        return Redirect()->back()->with($notification);
    }

    public function adminDeleteTes($id)
    {
        $testimonial = Testimonial::find($id);
        $old_image = $testimonial->photo;
        unlink($old_image);
        $delete = Testimonial::find($id)->delete();

        $notification = array(
            'message' => 'Testimonial Is Deleted Successfully!',
            'alert-type' => 'warning',
        );

        return Redirect()->back()->with($notification);
    }
}
