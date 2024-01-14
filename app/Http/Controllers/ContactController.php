<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact.form');
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        $contactData = [
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ];

        // Use the authenticated user's name and associate the contact with the user
        if (auth()->check()) {
            $contactData['name'] = auth()->user()->name;
            $contactData['user_id'] = auth()->user()->id;
        }

        Contact::create($contactData);

        return redirect()->route('contact.form')->with('status', 'Message sent successfully!');
    }

    
    
    public function all() {
        $contacts = Contact::all();
        return view('contact.all', compact('contacts'));
    }
}
