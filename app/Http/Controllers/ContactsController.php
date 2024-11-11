<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactsController extends Controller
{
    public function index() {
        $contacts = Contact::forUser(auth()->user()->id);
        return view('contacts.index', compact('contacts'));
    }

    public function create() {
        return view('contacts.create');
    }

    public function edit(Contact $contact) {
        return view('contacts.edit', compact('contact'));
    }

    public function update(ContactRequest $request, Contact $contact) {
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;

        $contact->save();

        session()->flash('success', 'Contact ' . $contact->name . ' updated successfully.');
        return redirect()->route('contacts');
    }
    
    public function delete(Contact $contact) {
        $contact->delete();
        session()->flash('success', 'Contact ' . $contact->name . ' deleted successfully.');
        return redirect()->route('contacts');
    }

    public function store(ContactRequest $request) {
        $contact = new Contact();
        $contact->user_id = auth()->user()->id;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;

        $contact->save();

        session()->flash('success', 'Contact ' . $contact->name . ' created successfully.');
        return redirect()->route('contacts');
    }
}
