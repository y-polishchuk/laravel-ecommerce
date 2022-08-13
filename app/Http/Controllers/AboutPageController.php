<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\HomeAbout;
use App\Models\TeamMember;
use App\Models\Skill;
use App\Models\Brand;

class AboutPageController extends Controller
{
    public function aboutUs()
    {
        $homeabout = HomeAbout::first();
        $teamMembers = TeamMember::all();
        $skills = Skill::all();
        $brands = Brand::all();
        return view('pages.about_us', compact('homeabout', 'teamMembers', 'skills', 'brands'));
    }
}
