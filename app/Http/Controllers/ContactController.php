<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\DataTables\MessagesDataTable;
use Yajra\DataTables\DataTables;


class ContactController extends Controller
{

    public function adminContact()
    {
        $contacts = Contact::all();
        return view('admin.contact.index', compact('contacts'));
    }

    public function adminAddContact()
    {
        return view('admin.contact.create');
    }

    public function adminStoreContact(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|unique:contacts',
            'phone' => 'required|unique:contacts',
            'address' => 'required|unique:contacts',
        ]);

        Contact::insert([
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Contact Is Inserted Successfully!',
            'alert-type' => 'success',
        );

        return Redirect()->route('admin.contact')->with($notification);
    }

    public function adminEditContact(Contact $contact)
    {
        return view('admin.contact.edit', compact('contact'));
    }

    public function adminUpdateContact(Request $request, Contact $contact)
    {
        $validated = $request->validate([
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $contact->update([
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        $notification = array(
            'message' => 'Contact Is Updated Successfully!',
            'alert-type' => 'info',
        );

        return Redirect()->route('admin.contact')->with($notification);
    }

    public function adminDeleteContact(Contact $contact)
    {
        $contact->delete();

        $notification = array(
            'message' => 'Contact Is Deleted Successfully!',
            'alert-type' => 'warning',
        );

        return Redirect()->back()->with($notification);
    }

    public function contact()
    {
        $contacts = DB::table('contacts')->first();
        return view('pages.contact', compact('contacts'));
    }

    public function contactForm(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        ContactForm::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        $notification = array(
            'message' => 'Your Message Is Sent Successfully!',
            'alert-type' => 'info',
        );

        return Redirect()->route('contact')->with($notification);
    }

    public function adminMessages(MessagesDataTable $dataTable)
    {
        return $dataTable->render('admin.contact.messages');
    }

    public function dataMessages(Request $request)
    {
        $messages = ContactForm::get();
 
        return DataTables::of($messages)
        ->addColumn('action', function ($message) {
            return view('admin.contact.action', ['message' => $message]);
        })
        ->rawColumns(['action'])
        ->toJson();
    }

    public function adminDeleteMessage(ContactForm $message)
    {
        $message->delete();

        $notification = array(
            'message' => 'Message Is Deleted Successfully!',
            'alert-type' => 'warning',
        );

        return Redirect()->back()->with($notification);
    }
}
