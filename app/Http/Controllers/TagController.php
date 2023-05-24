<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Tag;
use App\DataTables\TagsDataTable;
use App\DataTables\TagsTrashedDataTable;
use Yajra\DataTables\DataTables;

class TagController extends Controller
{

    public function adminTags(TagsDataTable $dataTable)
    {
        return $dataTable->render('admin.tag.tags');
    }

    public function dataTags(Request $request)
    {
        $tags = Tag::get();
 
        return DataTables::of($tags)
        ->editColumn('created_at', function ($tag) {
            return $tag->created_at->diffForHumans();
        })
        ->addColumn('action', function ($tag) {
            return view('admin.tag.action', ['tag' => $tag]);
        })
        ->rawColumns(['action'])
        ->toJson();
    }

    public function adminTagsTrashed(TagsTrashedDataTable $dataTable)
    {
        return $dataTable->render('admin.tag.trashed.trashed');
    }

    public function dataTagsTrashed(Request $request)
    {
        $tags = Tag::onlyTrashed()->latest();
 
        return DataTables::of($tags)
        ->editColumn('created_at', function ($tag) {
            return $tag->created_at->diffForHumans();
        })
        ->editColumn('deleted_at', function ($tag) {
            return $tag->deleted_at->diffForHumans();
        })
        ->addColumn('action', function ($tag) {
            return view('admin.tag.trashed.action', ['tag' => $tag]);
        })
        ->rawColumns(['action'])
        ->toJson();
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

    public function adminEditTag(Tag $tag)
    {
        return view('admin.tag.edit', compact('tag'));
    }

    public function adminUpdateTag(Request $request, Tag $tag)
    {
        $tag->update([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => 'Tag Is Updated Successfully!',
            'alert-type' => 'info',
        );

        return Redirect()->route('admin.tags')->with($notification);
    }

    public function tagSoftDelete(Tag $tag)
    {
        $tag->delete();

        $notification = array(
            'message' => 'Tag Is SoftDeleted Successfully!',
            'alert-type' => 'info',
        );
        
        return Redirect()->back()->with($notification);
    }

    public function tagRestore($id)
    {
        Tag::withTrashed()->find($id)->restore();

        $notification = array(
            'message' => 'Tag Is Restored Successfully!',
            'alert-type' => 'info',
        );
        
        return Redirect()->back()->with($notification);
    }

    public function tagPermDelete($id)
    {
        Tag::onlyTrashed()->find($id)->forceDelete();

        $notification = array(
            'message' => 'Tag Is Deleted Permanently!',
            'alert-type' => 'warning',
        );
        
        return Redirect()->back()->with($notification);
    }
}
