<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\FAQ;
use App\DataTables\FAQsDataTable;
use Yajra\DataTables\DataTables;

class FAQController extends Controller
{
        public function adminFAQs(FAQsDataTable $dataTable)
    {
        return $dataTable->render('admin.pricing.faq.faqs');
    }

    public function dataFAQs(Request $request)
    {
        $faqs = FAQ::get();
 
        return DataTables::of($faqs)
        ->editColumn('question', function ($faq) {
            return strip_tags($faq->question);
        })
        ->editColumn('answer', function ($faq) {
            return strip_tags($faq->answer);
        })
        ->addColumn('action', function ($faq) {
            return view('admin.pricing.faq.action', ['faq' => $faq]);
        })
        ->rawColumns(['action'])
        ->toJson();
    }

    public function adminAddFAQ()
    {
        return view('admin.pricing.faq.create_faq');
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

    public function adminEditFAQ(FAQ $faq)
    {
        return view('admin.pricing.faq.edit_faq', compact('faq'));
    }

    public function adminUpdateFAQ(Request $request, FAQ $faq)
    {
        $validated = $request->validate([
            'question' => 'required',
            'answer' => 'required'
        ]);

        $faq->update([
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

    public function adminDeleteFAQ(FAQ $faq)
    {
        $faq->delete();

        $notification = array(
            'message' => 'FAQ Is Deleted Successfully!',
            'alert-type' => 'warning',
        );

        return Redirect()->back()->with($notification);
    }
}
