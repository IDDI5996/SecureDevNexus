<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Example: send email (use your configured mail in .env)
        Mail::raw($request->message, function($mail) use ($request) {
            $mail->to('contact@techsolutions.com')
                 ->subject($request->subject)
                 ->from($request->email, $request->name);
        });

        return back()->with('success', 'Your message has been sent successfully!');
    }
}
