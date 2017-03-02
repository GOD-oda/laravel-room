<?php

namespace App\Http\Controllers;

use Mail;
use Session;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function contact(ContactRequest $request)
    {
        Mail::send('contact.mail', ['request' => $request], function (Message $message) {
            $message->to([
                'takahiro.tech.oda@gmail.com',
                'laravel.room@gmail.com'
            ])
                ->subject('Laravel Roomのお問い合わせ');
        });

        Session::flash('mail_success', true);

        return redirect('contact');
    }
}
