<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Store a contact form submission (AJAX).
     * Replaces php/contact.php
     */
    public function store(Request $request)
    {
        $errors = [];

        $name    = trim($request->input('name', ''));
        $email   = trim($request->input('email', ''));
        $subject = trim($request->input('subject', ''));
        $body    = trim($request->input('message', ''));

        // Server-side validation (matching original logic)
        if (strlen($name) < 2)    $errors[] = 'Name must be at least 2 characters.';
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Invalid email address.';
        if (strlen($subject) < 3) $errors[] = 'Subject is too short.';
        if (strlen($body) < 10)   $errors[] = 'Message must be at least 10 characters.';

        if ($errors) {
            return response()->json([
                'success' => false,
                'errors'  => $errors,
            ], 422);
        }

        try {
            Message::create([
                'name'    => $name,
                'email'   => $email,
                'subject' => $subject,
                'body'    => $body,
                'sent_at' => now(),
            ]);

            // Set cookie to remember sender's name (30 days)
            $cookie = cookie('last_contact_name', $name, 60 * 24 * 30);

            return response()->json([
                'success' => true,
                'message' => 'Message sent successfully!',
            ])->cookie($cookie);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error'   => 'Could not save message. Please try again.',
            ], 500);
        }
    }
}
