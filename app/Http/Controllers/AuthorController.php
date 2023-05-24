<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Author;
use Image;
use App\DataTables\AuthorsDataTable;
use Yajra\DataTables\DataTables;

class AuthorController extends Controller
{
    public function adminAuthors(AuthorsDataTable $dataTable)
    {
        return $dataTable->render('admin.author.authorship');
    }

    public function dataAuthors(Request $request)
    {
        $authors = Author::get();
 
        return DataTables::of($authors)
        ->addColumn('photo', function ($author) {
            return '<img src="'. asset($author->photo) .'" height="80px" />';
        })
        ->editColumn('about', function ($author) {
            return strip_tags($author->about);
        })
        ->addColumn('action', function ($author) {
            return view('admin.author.action', ['author' => $author]);
        })
        ->rawColumns(['photo', 'action'])
        ->toJson();
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

    public function adminEditAuthor(Author $author)
    {
        return view('admin.author.edit_author', compact('author'));
    }

    public function adminUpdateAuthor(Request $request, Author $author)
    {
        $validated = $request->validate([
            'full_name' => 'required',
            'about' => 'required|max:255',
            'twitter' => 'required',
            'facebook' => 'required',
            'instagram' => 'required'
        ]);

        $old_image = $request->old_image;
        $author_photo = $request->file('photo');

        if($author_photo) {
        $name_gen = hexdec(uniqid()).'.'.$author_photo->getClientOriginalExtension();
        $path = 'image/author/'.$name_gen;
        Image::make($author_photo->getRealPath())->resize(500, 500)->save($path);
        $author->photo = $path;
        $author->save();
    
        if(file_exists($old_image)) unlink($old_image);
        }

        $author->update($request->except('photo'));
        
        $notification = array(
            'message' => 'Author Is Updated Successfully!',
            'alert-type' => 'info',
        );

        return Redirect()->back()->with($notification);
    }

    public function adminDeleteAuthor(Author $author)
    {
        $old_image = $author->photo;
        if(file_exists($old_image)) unlink($old_image);
        $author->delete();

        $notification = array(
            'message' => 'Author Is Deleted Successfully!',
            'alert-type' => 'warning',
        );

        return Redirect()->back()->with($notification);
    }
}
