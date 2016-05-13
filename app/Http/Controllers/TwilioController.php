<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TwilioController extends Controller
{
    public function getIndex()
    {
        return redirect()->action('TwilioController@postOutBound');
    }

    public function postOutBound(Service_Twilio $twilio)
    {
        $twilio->account->calls->create(
            "+18668675309",
            "+14155551212",
            "http://demo.twilio.com/docs/voice.xml"
        );

        return response()->json('ok');
    }
}
