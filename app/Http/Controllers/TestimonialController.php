<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Testimonial;
use Image;
use App\DataTables\TestimonialsDataTable;
use Yajra\DataTables\DataTables;

class TestimonialController extends Controller
{
    public function aboutTes()
    {
        $testimonials = Testimonial::all();
        return view('pages.testimonials', compact('testimonials'));
    }

    public function adminTes(TestimonialsDataTable $dataTable)
    {
        return $dataTable->render('admin.about.testimonials.testimonials');
    }

    public function dataTes(Request $request)
    {
        $testimonials = Testimonial::get();
 
        return DataTables::of($testimonials)
        ->editColumn('text', function ($testimonial) {
            return strip_tags($testimonial->text);
        })
        ->addColumn('photo', function ($testimonial) {
            return '<img src="'. asset($testimonial->photo) .'" height="60px" />';
        })
        ->addColumn('action', function ($testimonial) {
            return view('admin.about.testimonials.action', ['testimonial' => $testimonial]);
        })
        ->rawColumns(['photo', 'action'])
        ->toJson();
    }

    public function adminAddTes()
    {
        return view('admin.about.testimonials.create_tes');
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

    public function adminEditTes(Testimonial $testimonial)
    {
        return view('admin.about.testimonials.edit_tes', compact('testimonial'));
    }

    public function adminUpdateTes(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'name' => 'required',
            'position' => 'required',
            'text' => 'required',
            'photo' => 'mimes:jpg,jpeg,png',
        ]);

        $old_image = $request->old_image;
        $tes_photo = $request->file('photo');

        if($tes_photo) {
        $name_gen = hexdec(uniqid()).'.'.$tes_photo->getClientOriginalExtension();
        $path = 'image/testims/'.$name_gen;
        Image::make($tes_photo->getRealPath())->fit(400, 400)->save($path);
        $testimonial->photo = $path;
        $testimonial->save();
    
        if(file_exists($old_image)) unlink($old_image);
        }
        $testimonial->update($request->except('photo'));

        $notification = array(
            'message' => 'Testimonial Is Updated Successfully!',
            'alert-type' => 'info',
        );

        return Redirect()->back()->with($notification);
    }

    public function adminDeleteTes(Testimonial $testimonial)
    {
        $old_image = $testimonial->photo;
        if(file_exists($old_image)) unlink($old_image);
        $testimonial->delete();

        $notification = array(
            'message' => 'Testimonial Is Deleted Successfully!',
            'alert-type' => 'warning',
        );

        return Redirect()->back()->with($notification);
    }
}
