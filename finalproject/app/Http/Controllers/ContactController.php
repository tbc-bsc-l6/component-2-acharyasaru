<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Display the contact page
    public function showContactForm()
    {
        return view('contact');
    }

    // Handle the contact form submission
    public function submitContactForm(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Store the submitted data in session for now (or use this data in any other way you want)
        session()->flash('success', 'Your message has been sent successfully!');
        session()->flash('contact_data', $request->all());  // Store the submitted form data

        // Redirect back to the contact page
        return redirect()->route('contact');
    }
}
