<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Author;
use Image;

class AuthorController extends Controller
{
    public function authorship()
    {
        $authors = Author::paginate(10);
        return view('admin.author.authorship', compact('authors'));
    }

    public function adminAddAuthor()
    {
        return view('admin.author.create_author');
    }

    public function adminStoreAuthor(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|unique:authors',
            'photo' => 'required|mimes:jpg,jpeg,png',
            'about' => 'required|unique:authors|max:255',
            'twitter' => 'required',
            'facebook' => 'required',
            'instagram' => 'required'
        ]);

        $author_photo = $request->file('photo');

        $name_gen = hexdec(uniqid()).'.'.$author_photo->getClientOriginalExtension();
        $last_img = 'image/author/'.$name_gen;
        Image::make($author_photo)->fit(500, 500)->save($last_img);

        Author::insert([
            'full_name' => $request->full_name,
            'photo' => $last_img,
            'about' => $request->about,
            'twitter' => $request->twitter,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Author Is Inserted Successfully!',
            'alert-type' => 'success',
        );

        return Redirect()->route('admin.authorship')->with($notification);
    }

    public function adminEditAuthor($id)
    {
        $author = Author::findOrFail($id);
        return view('admin.author.edit_author', compact('author'));
    }

    public function adminUpdateAuthor(Request $request, $id)
    {
        $validated = $request->validate([
            'full_name' => 'required',
            'about' => 'required|max:255',
            'twitter' => 'required',
            'facebook' => 'required',
            'instagram' => 'required'
        ]);

        $author = Author::find($id);
        $old_image = $request->old_image;
        $author_photo = $request->file('photo');

        if($author_photo) {
        $name_gen = hexdec(uniqid()).'.'.$author_photo->getClientOriginalExtension();
        $path = 'image/author/'.$name_gen;
        Image::make($author_photo->getRealPath())->resize(500, 500)->save($path);
        $author->photo = $path;
        $author->save();
    
        unlink($old_image);
        }

        $author->update($request->except('photo'));
        
        $notification = array(
            'message' => 'Author Is Updated Successfully!',
            'alert-type' => 'info',
        );

        return Redirect()->back()->with($notification);
    }

    public function adminDeleteAuthor($id)
    {
        $author = Author::find($id);
        $old_image = $author->photo;
        unlink($old_image);
        $delete = Author::find($id)->delete();

        $notification = array(
            'message' => 'Author Is Deleted Successfully!',
            'alert-type' => 'warning',
        );

        return Redirect()->back()->with($notification);
    }
}
