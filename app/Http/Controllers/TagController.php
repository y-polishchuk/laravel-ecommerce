<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Tag;

class TagController extends Controller
{
    public function adminTag()
    {
        $tags = Tag::paginate(5);
        $trashTag = Tag::onlyTrashed()->latest()->paginate(3);
        
        return view('admin.tag.tags', compact('tags', 'trashTag'));
    }

    public function adminStoreTag(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:tags|max:125',
        ]);

        Tag::insert([
            'name' => $request->name,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Tag Is Inserted Successfully!',
            'alert-type' => 'success',
        );

        return Redirect()->back()->with($notification);
    }

    public function adminEditTag($id)
    {
        $tag = Tag::find($id);
        return view('admin.tag.edit', compact('tag'));
    }

    public function adminUpdateTag(Request $request, $id)
    {
        $update = Tag::find($id)->update([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => 'Tag Is Updated Successfully!',
            'alert-type' => 'info',
        );

        return Redirect()->route('admin.tags')->with($notification);
    }

    public function tagSoftDelete($id)
    {
        $delete = Tag::find($id)->delete();

        $notification = array(
            'message' => 'Tag Is SoftDeleted Successfully!',
            'alert-type' => 'info',
        );
        
        return Redirect()->back()->with($notification);
    }

    public function tagRestore($id)
    {
        $delete = Tag::withTrashed()->find($id)->restore();

        $notification = array(
            'message' => 'Tag Is Restored Successfully!',
            'alert-type' => 'info',
        );
        
        return Redirect()->back()->with($notification);
    }

    public function tagPermDelete($id)
    {
        $delete = Tag::onlyTrashed()->find($id)->forceDelete();

        $notification = array(
            'message' => 'Tag Is Deleted Permanently!',
            'alert-type' => 'warning',
        );
        
        return Redirect()->back()->with($notification);
    }
}
