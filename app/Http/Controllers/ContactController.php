<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUsMail;

class ContactController extends Controller
{
    /**
     * Send contact us email
     */
    public function send(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:5000',
        ]);

        try {
            // Send email to support@aturdoit.com
            Mail::to('support@aturdoit.com')->send(
                new ContactUsMail(
                    $validated['name'] ?? 'Not provided',
                    $validated['email'],
                    $validated['message']
                )
            );

            // Redirect back with success message
            return redirect()->back()->with('success', 'Your message has been sent successfully! We will get back to you soon.');
        } catch (\Exception $e) {
            // Redirect back with error message
            return redirect()->back()->withErrors(['error' => 'Failed to send message. Please try again later.'])->withInput();
        }
    }
}
