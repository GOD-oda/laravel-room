<?php

namespace App\Http\Controllers;

use Mail;
use Session;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use App\Http\Requests\ContactRequest;
use App\Mail\Contacted;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function contact(ContactRequest $request)
    {
        Mail::to('laravel-room@conpw3.sakura.ne.jp')->send(new Contacted($request));

        Session::flash('mail_success', true);

        return redirect('contact');
    }
}
