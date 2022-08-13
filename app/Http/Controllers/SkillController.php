<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Skill;

class SkillController extends Controller
{
    public function skills()
    {
        $skills = Skill::all(); 
        return view('admin.about.skills', compact('skills'));
    }

    public function adminStoreSkill(Request $request)
    {
        $validated = $request->validate([
            'skill_name' => 'required|unique:skills',
            'value' => 'required'
        ]);

        Skill::insert([
            'skill_name' => $request->skill_name,
            'value' => $request->value,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Skill Is Inserted Successfully!',
            'alert-type' => 'success',
        );

        return Redirect()->back()->with($notification);
    }

    public function adminEditSkill($id)
    {
        $skill = Skill::find($id);
        return view('admin.about.edit_skill', compact('skill'));
    }

    public function adminUpdateSkill(Request $request, $id)
    {
        $update = Skill::find($id)->update([
            'skill_name' => $request->skill_name,
            'value' => $request->value,
        ]);

        $notification = array(
            'message' => 'Skill Is Updated Successfully!',
            'alert-type' => 'info',
        );

        return Redirect()->route('admin.skills')->with($notification);
    }

    public function adminDeleteSkill($id)
    {
        $delete = Skill::find($id)->delete();

        $notification = array(
            'message' => 'Skill Is Successfully Deleted!',
            'alert-type' => 'warning',
        );
        
        return Redirect()->back()->with($notification);
    }
}
