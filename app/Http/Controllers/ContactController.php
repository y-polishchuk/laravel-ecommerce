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

        return Redirect()->route('admin.contact')->with('success', 'Contact is Inserted Successfully!');
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

        return Redirect()->route('admin.contact')->with('success', 'Contact is Updated Successfully!');
    }

    public function adminDeleteContact($id)
    {
        $delete = Contact::find($id)->delete();
        return Redirect()->back()->with('success', 'Contact is Deleted Successfully!');
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

        return Redirect()->route('contact')->with('success', 'Your Message Is Sent Successfully!');
    }

    public function adminMessage()
    {
        $messages = ContactForm::all();
        return view('admin.contact.message', compact('messages'));
    }

    public function adminDeleteMessage($id)
    {
        $delete = ContactForm::find($id)->delete();
        return Redirect()->back()->with('success', 'Message is Deleted Successfully!');
    }
}
