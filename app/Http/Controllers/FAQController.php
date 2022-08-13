<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\FAQ;

class FAQController extends Controller
{
    public function adminFAQ()
    {
        $faqs = FAQ::all();
        return view('admin.pricing.faqs', compact('faqs'));
    }

    public function adminAddFAQ()
    {
        return view('admin.pricing.create_faq');
    }

    public function adminStoreFAQ(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required',
            'answer' => 'required'
        ]);

        FAQ::insert([
            'question' => $request->question,
            'answer' => $request->answer,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'FAQ Is Inserted Successfully!',
            'alert-type' => 'success',
        );

        return Redirect()->route('admin.faq')->with($notification);
    }

    public function adminEditFAQ($id)
    {
        $faq = FAQ::findOrFail($id);
        return view('admin.pricing.edit_faq', compact('faq'));
    }

    public function adminUpdateFAQ(Request $request, $id)
    {
        $validated = $request->validate([
            'question' => 'required',
            'answer' => 'required'
        ]);

        FAQ::find($id)->update([
            'question' => $request->question,
            'answer' => $request->answer,
            'updated_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'FAQ Is Updated Successfully!',
            'alert-type' => 'info',
        );

        return Redirect()->route('admin.faq')->with($notification);
    }

    public function adminDeleteFAQ($id)
    {
        $delete = FAQ::find($id)->delete();

        $notification = array(
            'message' => 'FAQ Is Deleted Successfully!',
            'alert-type' => 'warning',
        );

        return Redirect()->back()->with($notification);
    }
}
