<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    public function contact()
    {
        return view('contact.contact');
    }

    public function send(Request $request)
    {
        $data = $request->all();
        Mail::to('jonasvanreeth@gmail.com')
            ->send(new ContactMail($data));

        return back()->with(["success"=>"mail sended"]);
    }
}
