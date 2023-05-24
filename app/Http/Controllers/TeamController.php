<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\TeamMember;
use Image;
use App\DataTables\TeamMembersDataTable;
use Yajra\DataTables\DataTables;

class TeamController extends Controller
{
    public function webTeam()
    {
        $teamMembers = TeamMember::all();
        return view('pages.team', compact('teamMembers'));
    }

    public function adminTeam(TeamMembersDataTable $dataTable)
    {
        return $dataTable->render('admin.about.team.team');
    }

    public function dataTeam(Request $request)
    {
        $members = TeamMember::get();
 
        return DataTables::of($members)
        ->addColumn('photo', function ($member) {
            return '<img src="'. asset($member->photo) .'" height="60px" />';
        })
        ->addColumn('action', function ($member) {
            return view('admin.about.team.action', ['member' => $member]);
        })
        ->rawColumns(['photo', 'action'])
        ->toJson();
    }

    public function adminAddMember()
    {
        return view('admin.about.team.create_member');
    }

    public function adminStoreMember(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'position' => 'required',
            'photo' => 'required|mimes:jpg,jpeg,png',
            'twitter' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'linkedin' => 'required'
        ]);

        $member_photo = $request->file('photo');

        $name_gen = hexdec(uniqid()).'.'.$member_photo->getClientOriginalExtension();
        $last_img = 'image/team/'.$name_gen;
        Image::make($member_photo)->fit(500, 500)->save($last_img);

        TeamMember::insert([
            'name' => $request->name,
            'position' => $request->position,
            'photo' => $last_img,
            'twitter' => $request->twitter,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Team Member Is Inserted Successfully!',
            'alert-type' => 'success',
        );

        return Redirect()->route('admin.team')->with($notification);
    }

    public function adminEditMember(TeamMember $member)
    {
        return view('admin.about.team.edit_member', compact('member'));
    }

    public function adminUpdateMember(Request $request, TeamMember $member)
    {
        $validated = $request->validate([
            'name' => 'required',
            'position' => 'required',
            'twitter' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'linkedin' => 'required'
        ]);

        $old_image = $request->old_image;
        $member_photo = $request->file('photo');

        if($member_photo) {
        $name_gen = hexdec(uniqid()).'.'.$member_photo->getClientOriginalExtension();
        $path = 'image/team/'.$name_gen;
        Image::make($member_photo->getRealPath())->resize(500, 500)->save($path);
        $member->photo = $path;
        $member->save();
    
        if(file_exists($old_image)) unlink($old_image);
        }

        $member->update($request->except('photo'));
        
        $notification = array(
            'message' => 'Team Member Is Updated Successfully!',
            'alert-type' => 'info',
        );

        return Redirect()->back()->with($notification);
    }

    public function adminDeleteMember(TeamMember $member)
    {
        $old_image = $member->photo;
        if(file_exists($old_image)) unlink($old_image);
        $member->delete();

        $notification = array(
            'message' => 'Team Member Is Deleted Successfully!',
            'alert-type' => 'warning',
        );

        return Redirect()->back()->with($notification);
    }
}
