<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(ContactRequest $request)
    {
        $data = $request->validated();

        // In production, you would send an email here
        // Mail::to('admin@gtr-sport.com')->send(new ContactMail($data));

        return redirect()->route('contact')->with('success', 'Thank you for your message! We will get back to you soon.');
    }
}
