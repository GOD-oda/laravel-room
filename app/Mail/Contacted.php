<?php

namespace App\Mail;

use App\Http\Requests\ContactRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contacted extends Mailable
{
    use Queueable, SerializesModels;

    protected $request;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ContactRequest $request)
    {
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('laravel-room@conpw3.sakura.ne.jp')
                ->view('contact.mail')
                ->subject('Laravel Roomのお問い合わせ')
                ->with([
                    'contact_name'  => $this->request->name,
                    'contact_email' => $this->request->email,
                    'contact_uri'   => $this->request->uri,
                    'contact_title' => $this->request->title,
                    'contact_body'  => $this->request->body,
                ]);
    }
}
