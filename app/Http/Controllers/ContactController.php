<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


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

    public function adminEditContact($id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.contact.edit', compact('contact'));
    }

    public function adminUpdateContact(Request $request, $id)
    {
        $validated = $request->validate([
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        Contact::find($id)->update([
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

    public function adminDeleteContact($id)
    {
        $delete = Contact::find($id)->delete();

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
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        ContactForm::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Your Message Is Sent Successfully!',
            'alert-type' => 'info',
        );

        return Redirect()->route('contact')->with($notification);
    }

    public function adminMessage()
    {
        $messages = ContactForm::all();
        return view('admin.contact.message', compact('messages'));
    }

    public function adminDeleteMessage($id)
    {
        $delete = ContactForm::find($id)->delete();

        $notification = array(
            'message' => 'Message Is Deleted Successfully!',
            'alert-type' => 'warning',
        );

        return Redirect()->back()->with($notification);
    }
}
